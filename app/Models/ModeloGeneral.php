<?php

namespace App\Models;

use CodeIgniter\Model;

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

    // Validación de correos
    public function verificarduplicidadcorreo($correo)
    {
        return $this->db->table('tbl_pacientes')
            ->where('pa_correo', $correo)
            ->countAllResults() > 0;
    }

    //METODOS PARA LOS CASOS CLINICOS
    //ESTE ES EL INSERT
    //Este va a ser el metodo para el insert paciente
    public function MetodoModeloInsertCaso($ParametrosCasos)
    {
        try {
            $this->db->table('casos_clinicos')->insert([
                'nombres_apellidos' => $ParametrosCasos['nombres_apellidos'],
                'direccion' => $ParametrosCasos['direccion'],
                'fecha_nacimiento' => $ParametrosCasos['fecha_nacimiento'],
                'telefono' => $ParametrosCasos['telefono'],
                'cedula' => $ParametrosCasos['cedula'],
                'motivo_consulta' => $ParametrosCasos['motivo_consulta'],
                'antecedente_personal_1' => $ParametrosCasos['antecedente_personal_1'],
                'antecedente_personal_2' => $ParametrosCasos['antecedente_personal_2'],
                'antecedente_familiar_1' => $ParametrosCasos['antecedente_familiar_1'],
                'antecedente_familiar_2' => $ParametrosCasos['antecedente_familiar_2'],
                'odontograma' => $ParametrosCasos['odontograma']
            ]);

            return $this->db->insertID(); // devuelve el id insertado
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function SelectExtraerCasoFM($valoridurl)
    {
        return $this->db->table('casos_clinicos')
            ->where('id', $valoridurl)
            ->get()
            ->getResult();
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

        if (!empty($nombre)) $builder->like('nombres_apellidos', $nombre);
        if (!empty($cedula)) $builder->where('cedula', $cedula);
        if (!empty($fecha)) {
            $builder->where('fecha_registro >=', $fecha . ' 00:00:00');
            $builder->where('fecha_registro <=', $fecha . ' 23:59:59');
        }

        return $builder->get()->getResult();
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
