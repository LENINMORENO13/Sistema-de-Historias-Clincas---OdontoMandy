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
            echo 'Se conecto don Inge, vamos bien';
        } else {
            echo 'Error de conexion, a gastronomia';
        }
    }

    public function MetodoVerFormularioUsuario()
    {
        return view('VistaPacientes');
    }

    public function MetodoInsertarUsuario()
    {
        $edad = $_POST['VEdad'];
        if ($edad < 0 || $edad > 150) {
            echo "<script>alert('La edad debe estar entre 0 y 150 años.'); window.history.back();</script>";
            return;
        }
        $correo = $_POST['VCorreo'];
        $instancia = new ModeloGeneral();
        if ($instancia->verificarduplicidadcorreo($correo)) {
            echo "<script>alert('El correo utilizado ya existe.'); window.history.back();</script>";
            return;
        }


        $datos = [
            'pa_nombres' => $_POST['VNombres'],
            'pa_apellidos' => $_POST['VApellidos'],
            'pa_edad' => $edad,
            'pa_telefono' => $_POST['VTelefono'],
            'pa_direccion' => $_POST['VDireccion'],
            'pa_correo' => $correo,
            'pa_estado' => $_POST['VEstado'],
            'pa_fecha_registro' => date('Y-m-d H:i:s'),

        ];
        //Compruebo la ejecucion del metodo del modelo
        if ($instancia->MetodoModeloInsertUsuario($datos)) {
            session()->setFlashdata('success', 'Usuario registrado correctamente.');
            return redirect()->to(base_url('/Select'));
        } else {
            echo "<script>alert('Error al ingresar datos.'); window.history.back();</script>";
        }
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
            if ($contrasena === $usuario['contrasena']) {
                // Si la contraseña es correcta, redirigir a la página principal
                return redirect()->to(base_url('/Inicio'));
            } else {
                // Si la contraseña es incorrecta, enviar mensaje a la vista
                session()->setFlashdata('error', 'Contraseña incorrecta.');
            }
        }
        return view('headerLogin'); // Esta es la vista de login donde se mostrará el error
    }
    
    

    public function MetodoActualizarPacienteFC()
    {
        $instancia = new ModeloGeneral();
        $datos = [
            'pa_id' => $_POST['VId'],
            'pa_nombres' => $_POST['VNombres'],
            'pa_apellidos' => $_POST['VApellidos'],
            'pa_edad' => $_POST['VEdad'],
            'pa_telefono' => $_POST['VTelefono'],
            'pa_direccion' => $_POST['VDireccion'],
            'pa_correo' => $_POST['VCorreo'],
            'pa_estado' => $_POST['VEstado'],
        ];
        //Compruebo la ejecucion del metodo del modelo
        if ($instancia->ActualizarUsuarioFM($datos)) {
            return redirect()->to(base_url('/Select'));
        } else {
            echo ('Error al ingresar datos');
        }
    }

    public function MostrarDashboard()
    {
        $modelo = new ModeloGeneral();

        $totalPacientes = count($modelo->SelectUsuarioFM());


        $totalCasos = count($modelo->SelectCasosFM());

        $ultimosCasos = $modelo->SelectCasosFM();
        $ultimosCasos = array_slice($ultimosCasos, 0, 5);

        $data = [
            'totalPacientes' => $totalPacientes,
            'totalCasos' => $totalCasos,
            'ultimosCasos' => $ultimosCasos
        ];

        return view('VistaDashboard', $data);
    }
}
