<?php

namespace App\Controllers;

use App\Models\ModeloOracle;

class COracle extends BaseController
{
    // Método para mostrar los pacientes con opción de filtro
    public function index()
    {
        $nombre = $this->request->getVar('nombre');
        $estado = $this->request->getVar('estado');

        $modelo = new ModeloOracle();
        $pacientes = $modelo->getPacientes($nombre, $estado);

        return view('OracleCasos', [
            'pacientes' => $pacientes,
            'nombre' => $nombre,
            'estado' => $estado
        ]);
    }

    // Método para mostrar todos los casos clínicos
    public function casosClinicos()
    {
        $modelo = new ModeloOracle();
        $casos = $modelo->getCasosClinicos();

        return view('OracleCasosClinicos', [
            'casos' => $casos
        ]);
    }

    // Método para mostrar los casos clínicos de un paciente específico
    public function casosPaciente($idPaciente)
    {
        $modelo = new ModeloOracle();
        $casos = $modelo->getCasosPorPaciente($idPaciente);

        return view('OracleCasosPaciente', [
            'casos' => $casos
        ]);
    }

    // Método para mostrar el formulario de inserción
    public function insertarPaciente()
    {
        // Mostrar el formulario de inserción de paciente
        return view('FormularioInsertarPaciente');
    }

    // Método para procesar la inserción de un paciente
    public function procesarInsertarPaciente()
    {
        // Obtener los datos del formulario
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $edad = $this->request->getPost('edad');
        $telefono = $this->request->getPost('telefono');
        $direccion = $this->request->getPost('direccion');
        $correo = $this->request->getPost('correo');
        $estado = $this->request->getPost('estado');

        // Validación simple (puedes agregar más reglas si lo deseas)
        if (!$nombres || !$apellidos || !$edad || !$telefono || !$direccion || !$correo || !$estado) {
            return redirect()->back()->with('error', 'Todos los campos son requeridos.');
        }

        // Crear una instancia del modelo de Oracle
        $modelo = new ModeloOracle();

        // Crear un array con los datos que se insertarán
        $datosPaciente = [
            'PA_NOMBRES' => $nombres,
            'PA_APELLIDOS' => $apellidos,
            'PA_EDAD' => $edad,
            'PA_TELEFONO' => $telefono,
            'PA_DIRECCION' => $direccion,
            'PA_CORREO' => $correo,
            'PA_ESTADO' => $estado,
            'PA_FECHA_REGISTRO' => date('Y-m-d H:i:s'), // Fecha actual
        ];

        // Insertar los datos del paciente
        $modelo->insert($datosPaciente);

        // Redirigir con un mensaje de éxito
        return redirect()->to(base_url('/insertar-paciente'))->with('success', 'Paciente insertado correctamente.');
    }
}

    
    

