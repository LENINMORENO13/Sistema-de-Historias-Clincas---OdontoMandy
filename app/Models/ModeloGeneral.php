<?php

namespace App\Models;

use CodeIgniter\Model;
//Cambiar por nombre del archivo el de la clase
class ModeloGeneral extends Model
{

    //Modelo para el login
    // Nombre de la tabla
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
            $v1 = $ParametrosCasos['id_paciente'];
            $v2 = $ParametrosCasos['cc_descripcion'];
            $v3 = $ParametrosCasos['cc_diagnostico'];
            $v4 = $ParametrosCasos['cc_tratamiento'];
            $v5 = $ParametrosCasos['cc_fecha_consulta'];
            $v6 = $ParametrosCasos['cc_estado'];
            $query = $this->db->query("CALL SP_INSERT_CASO(?,?,?,?,?,?)", array($v1, $v2, $v3, $v4, $v5, $v6));

            return $query ? true : false;
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
            $variable = $this->db->query('CALL SP_SELECT_CASO');
            return $variable->getResult();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //Metodo para eliminar casos por ID
    public function EliminarCasoFM($ideliminar)
    {
        try {
            //Query realiza la sentencia de eliminado
            $variable = $this->db->query('CALL SP_DELETE_CASO(?)', array($ideliminar));
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

    public function ObtenerCasosConPacientes($buscar_paciente = '', $estado = '')
    {
        // Preparar la consulta para ejecutar el procedimiento almacenado
        $query = $this->db->query("CALL SP_OBTENER_CASOS_PACIENTES(?, ?)", [$buscar_paciente, $estado]);

        // Obtener los resultados
        return $query->getResult();
    }
}
