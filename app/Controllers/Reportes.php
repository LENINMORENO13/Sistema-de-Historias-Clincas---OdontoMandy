<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloGeneral;

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
        // 1. Get data
        $data['casos'] = $this->modelo->obtener_reporte();

        // 2. Load View
        $html = view('reporte_pacientes', $data);

        // 3. Initialize TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // 4. DISABLE DEFAULT HEADERS (Important for custom design)
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // 5. Set Margins
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetAutoPageBreak(TRUE, 15);

        // 6. Generate
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');

        // 7. Output
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('Reporte_General_Casos.pdf', 'I');
    }

    public function generarIndividual(int $pacienteId)
    {
        // ... (Tus validaciones y logs de ID se quedan igual) ...
        log_message('debug', 'generarIndividual llamado con ID: ' . $pacienteId);

        if ($pacienteId <= 0) {
            return redirect()->back()->with('error', 'ID inválido.');
        }

        // Obtener datos
        $datosReporte = $this->modelo->obtener_reporte_individual($pacienteId);

        // Validar que exista el paciente
        if (empty($datosReporte['paciente'])) {
            return redirect()->back()->with('error', 'Paciente no encontrado.');
        }

        // --- AQUÍ EMPIEZA LA MAGIA DEL DISEÑO ---

        // 1. Cargar la vista con el HTML "Kilo" (Asegúrate que el archivo se llame reporte_individual.php)
        $html = view('reporte_individual', $datosReporte);

        // 2. Iniciar TCPDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // 3. CONFIGURACIÓN CRÍTICA PARA EL DISEÑO
        // Desactivamos el Header y Footer por defecto de TCPDF
        // porque ya los dibujamos bonitos en el HTML.
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // 4. Márgenes (Izquierda, Arriba, Derecha)
        // 15mm es un margen estándar elegante.
        $pdf->SetMargins(15, 15, 15);

        // Margen automático inferior (para que no corte textos al final de la hoja)
        $pdf->SetAutoPageBreak(TRUE, 20);

        // 5. Metadatos
        $nombreCompleto = $datosReporte['paciente']['nombres_apellidos'];
        $pdf->SetCreator('SisOdontoMandy');
        $pdf->SetTitle('Historia Clínica - ' . $nombreCompleto);

        // 6. Generar
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');

        // 7. Salida
        $nombreArchivo = 'Historia_' . str_replace(' ', '_', $nombreCompleto) . '.pdf';
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output($nombreArchivo, 'I');

        exit;
    }
}
