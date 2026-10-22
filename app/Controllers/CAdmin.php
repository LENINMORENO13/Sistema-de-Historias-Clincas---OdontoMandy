<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModeloGeneral;

class CAdmin extends BaseController
{
    /**
     * Roles validos. Se valida en servidor porque el valor llega por POST.
     */
    private const ROLES = ['admin', 'odontologo', 'recepcion'];

    // Método para mostrar el formulario de registro
    public function mostrarFormularioRegistro()
    {
        return view('VistaRegistro');
    }

    // Método para procesar y guardar el nuevo usuario
    public function guardarUsuario()
    {
        $correo = trim((string) $this->request->getPost('correo'));
        $contrasena = (string) $this->request->getPost('contrasena');
        $rol = (string) $this->request->getPost('rol');

        if ($correo === '' || $contrasena === '' || $rol === '') {
            session()->setFlashdata('error', 'Por favor, complete todos los campos.');
            return redirect()->back()->withInput();
        }

        if (! in_array($rol, self::ROLES, true)) {
            session()->setFlashdata('error', 'El rol seleccionado no es valido.');
            return redirect()->back()->withInput();
        }

        $modelo = new ModeloGeneral();

        if ($modelo->correoExiste($correo)) {
            session()->setFlashdata('error', 'Ya existe un usuario registrado con ese correo.');
            return redirect()->back()->withInput();
        }

        $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);

        $datosUsuario = [
            'correo_electronico' => $correo,
            'contrasena' => $contrasena_hasheada,
            'rol' => $rol,
        ];

        if ($modelo->guardarUsuario($datosUsuario)) {
            session()->setFlashdata('success', 'Usuario registrado con éxito.');
        } else {
            session()->setFlashdata('error', 'Error al registrar el usuario.');
        }

        return redirect()->back();
    }
}
