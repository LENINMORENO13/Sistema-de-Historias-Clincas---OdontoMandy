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
            'nombres_apellidos' => $this->request->getPost('nombres_apellidos'),
            'direccion' => $this->request->getPost('direccion'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'edad' => $this->request->getPost('edad'),
            'telefono' => $this->request->getPost('telefono'),
            'cedula' => $this->request->getPost('cedula'),
            'motivo_consulta' => $this->request->getPost('motivo_consulta'),
            'antecedente_personal_1' => $this->request->getPost('antecedente_personal_1'),
            'antecedente_personal_2' => $this->request->getPost('antecedente_personal_2'),
            'antecedente_familiar_1' => $this->request->getPost('antecedente_familiar_1'),
            'antecedente_familiar_2' => $this->request->getPost('antecedente_familiar_2'),
            'odontograma' => $this->request->getPost('odontograma'),

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





    //Metodo para la historia clinica detallada
    public function MetodoMostrarCasoDetallado(){
        return view('historia_clinica_detalle');
    }

    public function MetodoInsertarCasoDetallado(){
        $instancia = new ModeloGeneral();
        $datosdetallados = [
            'id_paciente' => $this->request->getPost('id_paciente'),
            'diagnostico' => $this->request->getPost('diagnostico'),
            'tratamiento' => $this->request->getPost('tratamiento'),
            'indicaciones' => $this->request->getPost('indicaciones'),
        ];
        if ($instancia->MetodoModeloInsertCasoDetallado($datosdetallados)){
            return redirect()->to(base_url('/MostrarCD'));
        }else{
            echo ('Error al ingresar los datos');
        }
    }







    // return view('header') . view('historia_clinica_detallada' .view('footer'));
    

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
    { {
            $paciente = $this->request->getGet('buscar_caso_nombre') ?? '';
            $cedula = $this->request->getGet('buscar_caso_cedula') ?? '';

            $data = [];

            // Solo buscar si hay un filtro aplicado
            if (!empty($paciente) || !empty($cedula)) {
                $modelo = new ModeloGeneral();
                $casos = $modelo->ObtenerCasos($paciente, $cedula);

                if (empty($casos)) {
                    $data['mensaje_error'] = "No se encontraron resultados.";
                }

                $data['casosPacientes'] = $casos;
            } else {
                // No buscar nada, no mostrar tabla
                $data['casosPacientes'] = [];
            }

            return view('VistaCasosPacientes', $data);
        }
    }
}
