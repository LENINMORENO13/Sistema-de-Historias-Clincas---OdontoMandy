<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModeloGeneral;

class CAdmin extends BaseController
{
    public function mostrarFormularioRegistro()
    {
        return view('VistaRegistro');
    }

    public function guardarUsuario()
    {
        // Obtener datos del formulario
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');
        $rol = $this->request->getPost('rol'); 

        if (empty($correo) || empty($contrasena) || empty($rol)) {
            session()->setFlashdata('error', 'Por favor, complete todos los campos.');
            return redirect()->back()->withInput();
        }

        $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);

        $datosUsuario = [
            'correo_electronico' => $correo,
            'contrasena' => $contrasena_hasheada,
            'rol' => $rol, 
        ];

        $modelo = new ModeloGeneral();

        if ($modelo->guardarUsuario($datosUsuario)) {
            session()->setFlashdata('success', 'Usuario registrado con éxito.');
        } else {
            session()->setFlashdata('error', 'Error al registrar el usuario.');
        }

        return redirect()->back();
    }
}