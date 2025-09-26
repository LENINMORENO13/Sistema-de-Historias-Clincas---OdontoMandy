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


    //Metodo para seleccionar todos los pacientes
    public function SelectUsuarioFC()
    {
        // Instanciar el modelo
        $instancia = new ModeloGeneral();

        // Obtener datos del modelo
        $Vectordata = [
            "VectorDatos" => $instancia->SelectUsuarioFM(),
        ];
        return view('header')  . view("VistaSelectPacientes", $Vectordata) . view('footer');
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

    //Metodo para eliminar usuarios
    public function EliminarUsuarioFC($ParametroUrlId)
    {
        $instancia = new ModeloGeneral();
        if ($instancia->EliminarUsuarioFM($ParametroUrlId)) {
            session()->setFlashdata('success', 'Usuario eliminado correctamente.');
            return redirect()->to(base_url('/Select'));
        } else {
            echo ("Eliminacion No Exitosa");
        }
    }

    //LOGIN
    public function vistalogin()
    {
        return view('headerLogin') . view('footer'); // Carga la vista del login
    }

    //Funcion para hasehar las contraseñas
    public function convertirContraseñasAHASH()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_usuarios');

        $usuarios = $builder->get()->getResult();
        $totalActualizados = 0;

        foreach ($usuarios as $usuario) {
            $hash = password_hash($usuario->contrasena, PASSWORD_DEFAULT);

            $exito = $builder->where('id', $usuario->id)
                ->update(['contrasena' => $hash]);

            if ($exito) {
                echo "✅ Usuario ID {$usuario->id}: contraseña actualizada.<br>";
                $totalActualizados++;
            } else {
                echo "❌ Usuario ID {$usuario->id}: error al actualizar.<br>";
            }
        }

        echo "<br>🔁 Total contraseñas actualizadas: {$totalActualizados}";
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
            // Si el correo no está registrado, enviar mensaje a la vista
            session()->setFlashdata('error', 'Usuario no encontrado.');
        } else {
            // Verificar la contraseña
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Si la contraseña es correcta, redirigir a la página principal
                return redirect()->to(base_url('/Inicio'));
            } else {
                // Si la contraseña es incorrecta, enviar mensaje a la vista
                session()->setFlashdata('error', 'Contraseña incorrecta.');
            }
        }
        return redirect()->to(base_url('/')); // Esta es la vista de login donde se mostrará el error
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
