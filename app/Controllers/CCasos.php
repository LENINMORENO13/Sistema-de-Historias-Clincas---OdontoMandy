<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModeloGeneral;

class CCasos extends BaseController
{
    public function index()
    {
        return view("VistaCC");
    }



    public function MetodoInsertarCaso()
    {
        $instancia = new ModeloGeneral();
        $datos = [
            'id_paciente' => $this->request->getPost('id_paciente'),
            'cc_descripcion' => $this->request->getPost('cc_descripcion'),
            'cc_diagnostico' => $this->request->getPost('cc_diagnostico'),
            'cc_tratamiento' => $this->request->getPost('cc_tratamiento'),
            'cc_fecha_consulta' => $this->request->getPost('cc_fecha_consulta'),
            'cc_estado' => $this->request->getPost('cc_estado')
        ];
        //Compruebo la ejecucion del metodo del modelo
        if ($instancia->MetodoModeloInsertCaso($datos)) {
            return redirect()->to(base_url('/SelectCasos'));
        } else {
            echo ('Error al ingresar datos');
        }
        return view('header') . view('VistaCC') . view('footer');
    }

    //Metodo para seleccionar todos los casos clinicos
    public function SelectCasosFC()
    {
        // Instanciar el modelo
        $instancia = new ModeloGeneral();

        // Obtener datos del modelo
        $Vectordata = [
            "VectorDatos" => $instancia->SelectCasosFM(),
        ];
        return view('header') . view("VistaSelectCasos", $Vectordata) . view("footer");
    }

    public function ExtraerSelectCasoFC($idurl)
    {
        // Instanciar el modelo
        $instancia = new ModeloGeneral();

        // Obtener datos del modelo
        $Vectordata = [
            "VectorDatos" => $instancia->SelectExtraerCasoFM($idurl),
        ];
        return view("VistaActualizarCaso", $Vectordata);
    }

    public function EliminarCasoFC($ParametroUrlId)
    {
        $instancia = new ModeloGeneral();
        if ($instancia->EliminarCasoFM($ParametroUrlId)) {
            return redirect()->to(base_url('/SelectCasos'));
        } else {
            echo ("Eliminacion No Exitosa");
        }
    }



    //Modelo para la actualizacion de Casos
    public function MetodoActualizarCasosFC()
    {
        $instancia = new ModeloGeneral();
        $Vectorllavevalor = [
            'id_casos' => $_POST['VId'],
            'cc_descripcion' => $_POST['VDescripcion'],
            'cc_diagnostico' => $_POST['VDiagnostico'],
            'cc_tratamiento' => $_POST['VTratamiento'],
            'cc_fecha_consulta' => $_POST['VFechaConsulta'],
            'cc_estado' => $_POST['VEstado'],
        ];
        //Compruebo la ejecucion del metodo del modelo
        if ($instancia->ActualizarCasosFM($Vectorllavevalor)) {
            return redirect()->to(base_url('/SelectCasos'));
        } else {
            echo ('Error al actualizar datos');
        }
    }

    //METODO OBTENER CASOS CON PACIENTES CON INNER

    public function MostrarCasosConPacientes()
    {
        // Instanciamos el modelo
        $instancia = new ModeloGeneral();

        // Obtenemos los parámetros de búsqueda desde el formulario
        $buscar_paciente = $this->request->getGet('buscar_paciente');
        $estado = $this->request->getGet('estado');

        // Si se proporciona un parámetro de búsqueda, lo pasamos al modelo
        $datos['casosPacientes'] = $instancia->ObtenerCasosConPacientes($buscar_paciente, $estado);
        if(empty($casosPacientes)) {
            $datos ['mesaje error'] = 'No se encontraron resultados';
        } else {
            $datos ['casosPacientes'] = $casosPacientes;
        }
        return view('headerFiltracion'). view('VistaCasosPacientes', $datos);
    }
}
