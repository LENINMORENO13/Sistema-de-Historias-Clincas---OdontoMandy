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
            echo 'Error de conexion';
        }
    }

    public function MetodoVerFormularioUsuario()
    {
        return view('VistaPacientes');
    }


    public function ExtraerSelectUsuarioFC($idurl)
    {
        // Instanciar el modelo
        $instancia = new ModeloGeneral();

        // Obtener datos del modelo
        $Vectordata = [
            "VectorDatos" => $instancia->SelectExtraerUsuarioFM($idurl),
        ];
        return view("VistaActualizarPaciente", $Vectordata);
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

        $todosLosCasos = $modelo->SelectCasosFM();

        $totalCasos = count($todosLosCasos);
        $casosMes = 0;
        $casosHoy = 0;
        $pendientes = 0;

        $mesActual = date('m');
        $anioActual = date('Y');
        $fechaHoy = date('Y-m-d');

        foreach ($todosLosCasos as $caso) {

            $fechaDelCaso = $caso->fecha_registro;
            $timestamp = strtotime($fechaDelCaso);
            if (date('m', $timestamp) == $mesActual && date('Y', $timestamp) == $anioActual) {
                $casosMes++;
            }

            if (date('Y-m-d', $timestamp) == $fechaHoy) {
                $casosHoy++;
            }

            if (isset($caso->estado) && ($caso->estado == 'pendiente' || $caso->estado == 'inactivo')) {
                $pendientes++;
            }
        }

        $ultimosCasos = array_slice($todosLosCasos, 0, 5);


        $data = [
            'totalCasos'   => $totalCasos,
            'ultimosCasos' => $ultimosCasos,
            'casosMes'     => $casosMes,
            'casosHoy'     => $casosHoy,
            'pendientes'   => $pendientes
        ];

        return view('VistaDashboard', $data);
    }
}
