<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloOracle extends Model
{
    protected $DBGroup          = 'oracle';  // Conexión a Oracle
    protected $table            = 'CURSOS.TBL_PACIENTES';  // Tabla de pacientes
    protected $primaryKey       = 'ID_PACIENTE';
    protected $allowedFields    = ['PA_NOMBRES', 'PA_APELLIDOS', 'PA_EDAD', 'PA_TELEFONO', 'PA_DIRECCION', 'PA_CORREO', 'PA_ESTADO', 'PA_FECHA_REGISTRO'];

    // Método para obtener los pacientes con filtros
    public function getPacientes($nombre = null, $estado = null)
    {
        $builder = $this->builder();

        // Filtrar por nombre
        if ($nombre) {
            $builder->like('PA_NOMBRES', $nombre);
        }

        // Filtrar por estado
        if ($estado) {
            $builder->where('PA_ESTADO', $estado);
        }

        // Obtener los resultados
        return $builder->get()->getResultArray();
    }

    // Método para insertar un nuevo paciente
    public function insertarPaciente($data)
    {
        // Insertar los datos en la tabla
        return $this->db->table($this->table)->insert($data);
    }

    // Método para obtener los casos clínicos
    public function getCasosClinicos()
    {
        $builder = $this->db->table('CURSOS.TBL_CASOS_CLINICOS');  // Tabla de casos clínicos

        // Obtener todos los casos clínicos
        $builder->select('ID_CASOS, ID_PACIENTE, CC_DESCRIPCION, CC_DIAGNOSTICO, CC_TRATAMIENTO, CC_FECHA_CONSULTA, CC_FECHA_CREACION, CC_ESTADO, CC_FECHA_MODIFICACION');
        
        // Obtener los resultados
        return $builder->get()->getResultArray();
    }

    // Método para obtener los casos clínicos por paciente
    public function getCasosPorPaciente($idPaciente)
    {
        $builder = $this->db->table('CURSOS.TBL_CASOS_CLINICOS');  // Tabla de casos clínicos

        // Obtener los casos clínicos del paciente especificado
        $builder->where('ID_PACIENTE', $idPaciente);
        $builder->select('ID_CASOS, ID_PACIENTE, CC_DESCRIPCION, CC_DIAGNOSTICO, CC_TRATAMIENTO, CC_FECHA_CONSULTA, CC_FECHA_CREACION, CC_ESTADO, CC_FECHA_MODIFICACION');

        // Obtener los resultados
        return $builder->get()->getResultArray();
    }
}
