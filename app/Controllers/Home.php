<?php

namespace App\Controllers;

use App\Models\ModeloGeneral;

class Home extends BaseController
{

    //Test de pruebaconexion
    public function pruebaconexion()
    {
        $datosconexion = \Config\Database::connect();
        if ($datosconexion->connect()) {
            echo 'Se conecto al OdontoMandy correctamente';
        } else {
            echo 'Error de conexion, a gastronomia';
        }
    }

    public function MetodoVerFormularioUsuario()
    {
        return view('VistaPacientes');
    }



    //LOGIN
    public function vistalogin()
    {
        return view('headerLogin'); 
    }



    public function verificacionlogin()
    {

        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        // Crear una instancia del modelo
        $model = new ModeloGeneral();

        // Buscar el usuario en la base de datos
        $usuario = $model->obtenerUsuarioPorCorreo($correo);

        if (!$usuario) {
            session()->setFlashdata('error', 'Usuario no encontrado.');
        } else {
            if (password_verify($contrasena, $usuario['contrasena'])) {
                return redirect()->to(base_url('/Inicio'));
            } else {
                session()->setFlashdata('error', 'Contraseña incorrecta.');
            }
        }
        return redirect()->to(base_url('/')); 
    }


    public function MostrarDashboard()
    {
        $modelo = new ModeloGeneral();


        $totalCasos = count($modelo->SelectCasosFM());

        $ultimosCasos = $modelo->SelectCasosFM();
        $ultimosCasos = array_slice($ultimosCasos, 0, 5); 
        $data = [
            'totalCasos' => $totalCasos,
            'ultimosCasos' => $ultimosCasos
        ];

        return view('VistaDashboard', $data);
    }
}
