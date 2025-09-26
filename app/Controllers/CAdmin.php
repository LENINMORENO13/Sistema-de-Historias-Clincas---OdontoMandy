<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModeloGeneral;

class CAdmin extends BaseController
{
    // Método para mostrar el formulario de registro
    public function mostrarFormularioRegistro()
    {
        return view('VistaRegistro');
    }

    // Método para procesar y guardar el nuevo usuario
    public function guardarUsuario()
    {
        // Obtener datos del formulario
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');
        $rol = $this->request->getPost('rol'); // ¡Nuevo! Obtener el valor del rol

        // Validar que los campos no estén vacíos
        if (empty($correo) || empty($contrasena) || empty($rol)) {
            session()->setFlashdata('error', 'Por favor, complete todos los campos.');
            return redirect()->back()->withInput();
        }

        // HASHEAR LA CONTRASEÑA antes de guardarla
        $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);

        $datosUsuario = [
            'correo_electronico' => $correo,
            'contrasena' => $contrasena_hasheada,
            'rol' => $rol, 
        ];

        // Instanciar el modelo
        $modelo = new ModeloGeneral();

        // Guardar el usuario en la base de datos
        if ($modelo->guardarUsuario($datosUsuario)) {
            session()->setFlashdata('success', 'Usuario registrado con éxito.');
        } else {
            session()->setFlashdata('error', 'Error al registrar el usuario.');
        }

        return redirect()->back();
    }
}