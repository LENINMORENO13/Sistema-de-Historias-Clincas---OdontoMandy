<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloGeneral;

// Cargar la librería TCPDF
require_once(APPPATH . 'ThirdParty/tcpdf/tcpdf.php');

class Reportes extends Controller
{
    protected $modelo;

    public function __construct()
    {
        $this->modelo = new ModeloGeneral();
    }

    public function generar_reporte()
    {
        // 1. Obtener los datos del modelo
        $data['casos'] = $this->modelo->obtener_reporte();

        // 2. Cargar la vista con los datos y obtener el HTML
        $html = view('reporte_pacientes', $data);

        // 3. Generar el PDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Reporte de Casos Clínicos');
        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        // Generar el PDF para descargar
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('reporte_casos.pdf', 'I');
    }

    public function generarIndividual(int $pacienteId)
    {
        // 1. Añadimos un registro para ver el ID recibido
        log_message('debug', 'generarIndividual llamado con ID de paciente: ' . $pacienteId);

        // 2. Validar que el ID del paciente sea un número positivo
        if ($pacienteId <= 0) {
            log_message('error', 'ID de paciente inválido (ID: ' . $pacienteId . '). Redireccionando.');
            session()->setFlashdata('error', 'ID de paciente inválido.');
            return redirect()->back();
        }

        // 3. Obtener los datos del Modelo
        $datosReporte = $this->modelo->obtener_reporte_individual($pacienteId); 

        // 4. Añadimos un registro para ver qué datos devuelve el modelo
        log_message('debug', 'Datos del reporte recibidos del modelo: ' . print_r($datosReporte, true));

        // 5. Validar que el paciente exista
        if (empty($datosReporte['paciente'])) {
            log_message('error', 'Paciente con ID ' . $pacienteId . ' no encontrado en el modelo. Redireccionando.');
            session()->setFlashdata('error', 'Paciente no encontrado o sin datos clínicos asociados.');
            return redirect()->back();
        }

        // 6. Cargar la vista con los datos y obtener el HTML
        $html = view('reporte_individual', $datosReporte);

        // 7. Generar el PDF con TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Obtener el nombre completo del paciente usando el campo correcto
        $nombreCompleto = $datosReporte['paciente']['nombres_apellidos'];

        // Configuración
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Reporte Individual de: ' . $nombreCompleto);

        $pdf->SetHeaderData('', 0, 'Reporte Odontológico Individual', 'Paciente: ' . $nombreCompleto);
        $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
        $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Añadir página
        $pdf->AddPage();

        // Escribir el HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Nombre del archivo para descarga
        $nombreArchivo = 'Reporte_Individual_' . str_replace(' ', '_', $nombreCompleto) . '.pdf';

        // Generar el PDF
        $pdf->Output($nombreArchivo, 'I');
        
        exit;
    }
}
