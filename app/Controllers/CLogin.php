<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModeloGeneral;

class CLogin extends BaseController
{
    public function index()
    {
        return view("VistaLogin");
    }
    
    public function MetodoLogin(){

        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        //Intanciamos el modelo
        $instancia = new ModeloGeneral();

        $usuariovalido= $instancia->validarLogin($correo,$contrasena);

        if ($usuariovalido && password_verify($contrasena, $usuariovalido->contrasena)) {
            session()->set('usuario', $usuariovalido);
            session()->setFlashdata('success','Bienvenido');
            return redirect()->to(site_url('InsertPaciente'));

        }else{
            session()->setFlashdata('error','Usuario o contraseña incorrectos');
            return redirect()->back();
        }
    }
}
