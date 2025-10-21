<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloGeneral extends Model
{
    protected $table = 'casos_clinicos';
    protected $primaryKey = 'id';

    // Modelo login
    public function obtenerUsuarioPorCorreo($correo)
    {
        return $this->db->table('tbl_usuarios')
            ->where('correo_electronico', $correo)
            ->get()
            ->getRowArray();
    }

    // Insert usuario
    public function MetodoModeloInsertUsuario($Parametros)
    {
        try {
            return $this->db->table('tbl_pacientes')->insert([
                'pa_nombres' => $Parametros['pa_nombres'],
                'pa_apellidos' => $Parametros['pa_apellidos'],
                'pa_edad' => $Parametros['pa_edad'],
                'pa_telefono' => $Parametros['pa_telefono'],
                'pa_direccion' => $Parametros['pa_direccion'],
                'pa_correo' => $Parametros['pa_correo'],
                'pa_estado' => $Parametros['pa_estado']
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    // Validación de correos
    public function verificarduplicidadcorreo($correo)
    {
        return $this->db->table('tbl_pacientes')
            ->where('pa_correo', $correo)
            ->countAllResults() > 0;
    }

    // Select usuarios
    public function SelectUsuarioFM()
    {
        return $this->db->table('tbl_pacientes')->get()->getResult();
    }

    public function SelectExtraerUsuarioFM($valoridurl)
    {
        return $this->db->table('tbl_pacientes')
            ->where('pa_id', $valoridurl)
            ->get()
            ->getResult();
    }

    public function EliminarUsuarioFM($ideliminar)
    {
        return $this->db->table('tbl_pacientes')
            ->where('pa_id', $ideliminar)
            ->delete();
    }

    // Insert casos clínicos
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
        return $this->db->table('casos_clinicos')->get()->getResult();
    }

    public function MetodoModeloInsertCasoDetallado($ParametrosCasoDetallado)
    {
        return $this->db->table('historial_clinico_detalle')->insert([
            'id' => $ParametrosCasoDetallado['id_paciente'],
            'diagnostico' => $ParametrosCasoDetallado['diagnostico'],
            'tratamiento' => $ParametrosCasoDetallado['tratamiento'],
            'indicaciones' => $ParametrosCasoDetallado['indicaciones'],
            'estado' => $ParametrosCasoDetallado['estado']
        ]);
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
        return $this->db->table('casos_clinicos')
            ->where('id', $datosenviadosdelpost['id_casos'])
            ->update([
                'cc_descripcion' => $datosenviadosdelpost['cc_descripcion'],
                'cc_diagnostico' => $datosenviadosdelpost['cc_diagnostico'],
                'cc_tratamiento' => $datosenviadosdelpost['cc_tratamiento'],
                'cc_fecha_consulta' => $datosenviadosdelpost['cc_fecha_consulta'],
                'cc_estado' => $datosenviadosdelpost['cc_estado']
            ]);
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
}
