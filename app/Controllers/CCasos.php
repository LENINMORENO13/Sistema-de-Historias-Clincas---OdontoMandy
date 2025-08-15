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
        $odontograma = $this->request->getPost('odontograma');

        if (is_array($odontograma)) {
            $odontograma_json = json_encode($odontograma);
        } else {
            $odontograma_json = $odontograma ?? '{}';
        }

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
            'odontograma' => $odontograma_json, // aquí uso la variable con JSON
        ];

        $nuevo_id = $instancia->MetodoModeloInsertCaso($datos);

        if ($nuevo_id) {
            return redirect()->to(base_url('/MostrarCD/' . $nuevo_id));
        } else {
            echo ('Error al ingresar datos');
            return;
        }
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
    public function MetodoMostrarCasoDetallado($id_paciente = null)
    {
        if (!$id_paciente) {
            return redirect()->to(base_url('/SelectCasos'));
        }
        return view('historia_clinica_detalle', ['id_paciente' => $id_paciente]);
    }


    public function MetodoInsertarCasoDetallado()
    {
        $instancia = new ModeloGeneral();
        $datosdetallados = [
            'id_paciente' => $this->request->getPost('id_paciente'),
            'diagnostico' => $this->request->getPost('diagnostico'),
            'tratamiento' => $this->request->getPost('tratamiento'),
            'indicaciones' => $this->request->getPost('indicaciones'),

            'estado' => $this->request->getPost('estado'),
        ];
        $resultado = $instancia->MetodoModeloInsertCasoDetallado($datosdetallados);
        if ($resultado) {
            session()->setFlashdata('mensaje_exito', 'El registro clinico se ha guardado correctamente');
            return redirect()->to(base_url('/ResumenHistorial/' . $datosdetallados['id_paciente']));
        } else {
            session()->setFlashdata('mensaje_error', 'Hubo un error al guardar los datos del caso clinico. Por favor, inténtelo de nuevo');
            return redirect()->back()->withInput();
        }
    }


    public function mostrarFormularioDetallado($idPaciente)
    {
        return view('VistaFormularioDetallado', ['id_paciente' => $idPaciente]);
    }




    //Metodo para ver la hisoira clincia detallada
    public function MetodoResumenHistorial($id_paciente)
    {
        $modelo = new ModeloGeneral();

        // Obtener datos generales del paciente (si quieres mostrarlos)
        $datosPaciente = $modelo->obtenerDatosPaciente($id_paciente);

        // Obtener el historial detallado (casos clínicos detallados)
        $historial = $modelo->obtenerHistorialClinicoPorPaciente($id_paciente);

        return view('resumen_historial_paciente', [
            'id_paciente' => $id_paciente,
            'datosPaciente' => $datosPaciente,
            'historial' => $historial
        ]);
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
    { {
            helper('Fecha');

            $paciente = $this->request->getGet('buscar_caso_nombre') ?? '';
            $cedula = $this->request->getGet('buscar_caso_cedula') ?? '';
            $fecha = $this->request->getGet('buscar_caso_fecha') ?? '';

            $data = [];

            // Solo buscar si hay un filtro aplicado
            if (!empty($paciente) || !empty($cedula) || !empty($fecha)) {
                $modelo = new ModeloGeneral();
                $casos = $modelo->ObtenerCasos($paciente, $cedula, $fecha);

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

    public function buscar_caso()
    {
        $nombre = $this->request->getGet('buscar_caso_nombre') ?? '';
        $cedula = $this->request->getGet('buscar_caso_cedula') ?? '';
        $fecha = $this->request->getGet('buscar_caso_fecha') ?? '';

        $modelo = new ModeloGeneral();
        $resultados = $modelo->ObtenerCasos($nombre, $cedula, $fecha);

        return view('VistaCasosPacientes', [
            'casosPacientes' => $resultados,
            'mensaje_error' => empty($resultados) ? 'No se encontraron resultados.' : ''
        ]);
    }
}
