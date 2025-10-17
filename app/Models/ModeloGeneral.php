<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;
use LDAP\Result;

class ModeloGeneral extends Model
{
    protected $table = 'casos_clinicos';
    protected $primaryKey = 'id';


    public function obtenerUsuarioPorCorreo($correo)
    {
        // Conexión directa a la base de datos
        $db = \Config\Database::connect();
        $query = $db->table('tbl_usuarios')->where('correo_electronico', $correo)->get();

        return $query->getRowArray(); 
    }

    //Modelo validacion de correos
    public function verificarduplicidadcorreo($correo)
    {

        $builder = $this->db->table('tbl_pacientes');
        $builder->where('pa_correo', $correo);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //METODOS PARA LOS CASOS CLINICOS
    //ESTE ES EL INSERT
    //Este va a ser el metodo para el insert paciente
    public function MetodoModeloInsertCaso($ParametrosCasos)
    {
        try {
            $v1 = $ParametrosCasos['nombres_apellidos'];
            $v2 = $ParametrosCasos['direccion'];
            $v3 = $ParametrosCasos['fecha_nacimiento'];
            $v5 = $ParametrosCasos['telefono'];
            $v6 = $ParametrosCasos['cedula'];
            $v7 = $ParametrosCasos['motivo_consulta'];
            $v8 = $ParametrosCasos['antecedente_personal_1'];
            $v9 = $ParametrosCasos['antecedente_personal_2'];
            $v10 = $ParametrosCasos['antecedente_familiar_1'];
            $v11 = $ParametrosCasos['antecedente_familiar_2'];
            $v12 = $ParametrosCasos['odontograma'];



            $query = $this->db->query(
                "CALL SP_INSERT_CASO_CLINICO(?,?,?,?,?,?,?,?,?,?,?)",
                [$v1, $v2, $v3, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12]
            );

            // Esto captura el primer resultado del SELECT LAST_INSERT_ID()
            $result = $query->getRow();
            return $result->nuevo_id ?? false;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function SelectExtraerCasoFM($valoridurl)
    {
        try {
            $variable = $this->db->query('CALL SP_EXTRAERID_CASO(?)', array($valoridurl));
            return $variable->getResult();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function SelectCasosFM()
    {
        try {
            $builder = $this->db->query('CALL SP_ListarCasosClinicos');
            $result = $builder->getResult();
            $builder->freeResult();
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function MetodoModeloInsertCasoDetallado($ParametrosCasoDetallado)
    {
        try {
            // Prepara los datos para la inserción en la tabla
            $data = [
                'id' => $ParametrosCasoDetallado['id_paciente'],
                'diagnostico' => $ParametrosCasoDetallado['diagnostico'],
                'tratamiento' => $ParametrosCasoDetallado['tratamiento'],
                'indicaciones' => $ParametrosCasoDetallado['indicaciones'],
                'fecha_del_registro' => date('Y-m-d H:i:s'), 
                'estado' => $ParametrosCasoDetallado['estado']
            ];

            $this->db->table('historial_clinico_detalle')->insert($data);

            return $this->db->affectedRows() ? true : false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function obtenerDatosPaciente($id_paciente)
    {
        return $this->db->table('casos_clinicos')
            ->where('id', $id_paciente)
            ->get()
            ->getRow();
    }

    public function obtenerHistorialClinicoPorPaciente($id_paciente)
    {
        return $this->db->table('historial_clinico_detalle')
            ->where('id', $id_paciente)
            ->get()
            ->getResult();
    }


    //Metodo actualizar casos
    public function ActualizarCasosFM($datosenviadosdelpost)
    {
        try {
            $v1 = $datosenviadosdelpost['id_casos'];
            $v2 = $datosenviadosdelpost['cc_descripcion'];
            $v3 = $datosenviadosdelpost['cc_diagnostico'];
            $v4 = $datosenviadosdelpost['cc_tratamiento'];
            $v5 = $datosenviadosdelpost['cc_fecha_consulta'];
            $v6 = $datosenviadosdelpost['cc_estado'];

            //La funcion queryBuilder para realizar el insert
            $query = $this->db->query('CALL SP_UPDATE_CASO(?,?,?,?,?,?)', array($v1, $v2, $v3, $v4, $v5, $v6));

            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function ObtenerCasos($nombre = '', $cedula = '', $fecha = '')
    {
        $builder = $this->db->table('casos_clinicos');

        if (!empty($nombre)) {
            $builder->like('nombres_apellidos', $nombre);
        }
        if (!empty($cedula)) {
            $builder->where('cedula', $cedula);
        }
        if (!empty($fecha)) {
            $fecha_inicio = $fecha . ' 00:00:00';
            $fecha_fin = $fecha . ' 23:59:59';
            $builder->where('fecha_registro >=', $fecha_inicio);
            $builder->where('fecha_registro <=', $fecha_fin);
        }

        $query = $builder->get();
        return $query->getResult();
    }


    // Nuevo método para obtener datos para el reporte
    public function obtener_reporte()
    {
        try {
            $query = $this->db->query('CALL SP_GENERAR_REPORTE()');

            $result = $query->getResult();

            $query->freeResult();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function obtener_reporte_individual($id_paciente)
    {
        $queryPaciente = $this->db->query("SELECT * FROM casos_clinicos WHERE id = ?", array($id_paciente));
        $paciente = $queryPaciente->getRowArray();

        $queryHistoriales = $this->db->query("SELECT * FROM historial_clinico_detalle WHERE id = ? ORDER BY fecha_del_registro ASC", array($id_paciente));
        $historiales = $queryHistoriales->getResultArray();

        if (!$paciente) {
            return ['paciente' => [], 'detalles_casos' => []];
        }

        $reporte = [
            'paciente' => $paciente,
            'detalles_casos' => $historiales
        ];

        return $reporte;
    }

    public function guardarUsuario($datos)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_usuarios'); 

        return $builder->insert($datos);
    }
}
