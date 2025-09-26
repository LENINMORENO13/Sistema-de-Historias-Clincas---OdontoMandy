<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;
use LDAP\Result;

//Cambiar por nombre del archivo el de la clase
class ModeloGeneral extends Model
{
    protected $table = 'casos_clinicos';
    protected $primaryKey = 'id';


    public function obtenerUsuarioPorCorreo($correo)
    {
        // Conexión directa a la base de datos
        $db = \Config\Database::connect();

        // Consulta para obtener el usuario por correo
        $query = $db->table('tbl_usuarios')->where('correo_electronico', $correo)->get();

        return $query->getRowArray(); // Devuelve el usuario como un array o null si no lo encuentra
    }



    //Este va a ser el metodo para el insert paciente
    public function MetodoModeloInsertUsuario($Parametros)
    {
        try {
            $v1 = $Parametros['pa_nombres'];
            $v2 = $Parametros['pa_apellidos'];
            $v3 = $Parametros['pa_edad'];
            $v4 = $Parametros['pa_telefono'];
            $v5 = $Parametros['pa_direccion'];
            $v6 = $Parametros['pa_correo'];
            $v7 = $Parametros['pa_estado'];
            $query = $this->db->query("CALL SP_INSERT_USUARIO(?,?,?,?,?,?,?)", array($v1, $v2, $v3, $v4, $v5, $v6, $v7));

            return $query ? true : false;
        } catch (\Throwable $th) {
            return $th;
        }
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


    //Este va a ser el metodo select usuario
    public function SelectUsuarioFM()
    {
        try {
            $variable = $this->db->query('CALL SP_SELECT_USUARIO');
            return $variable->getResult();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function SelectExtraerUsuarioFM($valoridurl)
    {
        try {
            $variable = $this->db->query('CALL SP_EXTRAERID_USUARIO(?)', array($valoridurl));
            return $variable->getResult();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //Metodo para eliminar pacientes por ID
    public function EliminarUsuarioFM($ideliminar)
    {
        try {
            //Query realiza la sentencia de eliminado
            $variable = $this->db->query('CALL SP_DELETE_USUARIO(?)', array($ideliminar));
            //Este if es para validar si se elimino o no
            if ($variable) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function ActualizarUsuarioFM($datosenviadosdelpost)
    {
        try {
            //Este es el desgllose de las varibales recibidas del POST del controlador en el 
            //vector llave valor del $datosenviadosdelpost
            $v1 = $datosenviadosdelpost['pa_id'];
            $v2 = $datosenviadosdelpost['pa_nombres'];
            $v3 = $datosenviadosdelpost['pa_apellidos'];
            $v4 = $datosenviadosdelpost['pa_edad'];
            $v5 = $datosenviadosdelpost['pa_telefono'];
            $v6 = $datosenviadosdelpost['pa_direccion'];
            $v7 = $datosenviadosdelpost['pa_correo'];
            $v8 = $datosenviadosdelpost['pa_estado'];


            //La funcion queryBuilder para realizar el insert
            $query = $this->db->query('CALL SP_UPDATE_USUARIO(?,?,?,?,?,?,?,?)', array($v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8));

            //Validacion de la insercion
            if ($query) {
                return true;
            } else {
                return false;
            }
            // password_verify("1234", $v2);
        } catch (\Throwable $th) {
            throw $th;
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
                // El ID del paciente va directamente a la columna 'id' de la tabla de historial
                'id' => $ParametrosCasoDetallado['id_paciente'],
                'diagnostico' => $ParametrosCasoDetallado['diagnostico'],
                'tratamiento' => $ParametrosCasoDetallado['tratamiento'],
                'indicaciones' => $ParametrosCasoDetallado['indicaciones'],
                'fecha_del_registro' => date('Y-m-d H:i:s'), // Genera la fecha y hora actuales
                'estado' => $ParametrosCasoDetallado['estado']
            ];

            // Realiza la inserción directa en la tabla 'historial_clinico_detalle'
            $this->db->table('historial_clinico_detalle')->insert($data);

            // Devuelve verdadero si la inserción fue exitosa
            return $this->db->affectedRows() ? true : false;
        } catch (\Throwable $th) {
            // Lanza una excepción si hay un error
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
            //Este es el desgllose de las varibales recibidas del POST del controlador en el 
            //vector llave valor del $datosenviadosdelpost
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
            // Llama al procedimiento almacenado para obtener los datos
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
        // Obtiene la información del paciente
        $queryPaciente = $this->db->query("SELECT * FROM casos_clinicos WHERE id = ?", array($id_paciente));
        $paciente = $queryPaciente->getRowArray();

        // Obtiene todos los historiales del paciente, ordenados por fecha
        $queryHistoriales = $this->db->query("SELECT * FROM historial_clinico_detalle WHERE id = ? ORDER BY fecha_del_registro ASC", array($id_paciente));
        $historiales = $queryHistoriales->getResultArray();

        // Si el paciente no existe, devuelve un array vacío para evitar errores
        if (!$paciente) {
            return ['paciente' => [], 'detalles_casos' => []];
        }

        // Combina los datos del paciente y sus historiales en un solo array
        // La clave 'detalles_casos' ahora coincide con la vista
        $reporte = [
            'paciente' => $paciente,
            'detalles_casos' => $historiales
        ];

        return $reporte;
    }

    public function guardarUsuario($datos)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_usuarios'); // Asegúrate de que este es el nombre de tu tabla de usuarios

        // El método insert retorna true si la inserción fue exitosa, de lo contrario false.
        return $builder->insert($datos);
    }
}
