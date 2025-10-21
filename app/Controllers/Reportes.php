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
    // Validación básica
    if ($pacienteId <= 0) {
        session()->setFlashdata('error', 'ID de paciente inválido.');
        return redirect()->back();
    }

    // Obtener datos desde el modelo
    $datosReporte = $this->modelo->obtener_reporte_individual($pacienteId);

    // Validar si existe paciente
    if (empty($datosReporte['paciente'])) {
        session()->setFlashdata('error', 'Paciente no encontrado.');
        return redirect()->back();
    }

    // Renderizar HTML desde la vista
    $html = view('reporte_individual', $datosReporte);

    // Crear instancia de TCPDF
    $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Configurar PDF
    $pdf->SetCreator(PDF_CREATOR);
    $nombreCompleto = $datosReporte['paciente']['nombres_apellidos'];
    $pdf->SetTitle('Reporte Individual de: ' . $nombreCompleto);

    // Remover header y footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Ajustar márgenes: reducir margen superior
    $pdf->SetMargins(10, 8, 10); // izquierda, arriba, derecha
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Añadir una página
    $pdf->AddPage();

    // Escribir el HTML
    $pdf->writeHTML($html, true, false, true, false, '');

    // Nombre del archivo
    $nombreArchivo = 'Reporte_Individual_' . str_replace(' ', '_', $nombreCompleto) . '.pdf';

    // Mostrar en navegador
    $pdf->Output($nombreArchivo, 'I');

    exit;
}


}
