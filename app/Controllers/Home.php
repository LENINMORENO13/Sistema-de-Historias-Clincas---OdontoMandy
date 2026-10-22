<?php

namespace App\Controllers;

use App\Models\ModeloGeneral;

class Home extends BaseController
{
    /**
     * Numero maximo de intentos fallidos antes de bloquear el login.
     */
    private const MAX_INTENTOS = 5;

    /**
     * Segundos de bloqueo tras superar el maximo de intentos.
     */
    private const SEGUNDOS_BLOQUEO = 300;

    /**
     * LOGIN
     */
    public function vistalogin()
    {
        return view('headerLogin');
    }

    public function verificacionlogin()
    {
        $correo = trim((string) $this->request->getPost('correo'));
        $contrasena = (string) $this->request->getPost('contrasena');

        if ($correo === '' || $contrasena === '') {
            session()->setFlashdata('error', 'Ingresa tu correo y contrasena.');
            return redirect()->to(base_url('/'));
        }

        if ($this->loginBloqueado()) {
            session()->setFlashdata('error', 'Demasiados intentos fallidos. Espera unos minutos e intentalo de nuevo.');
            return redirect()->to(base_url('/'));
        }

        $model = new ModeloGeneral();
        $usuario = $model->obtenerUsuarioPorCorreo($correo);

        if (!$usuario || ! password_verify($contrasena, $usuario['contrasena'])) {
            $this->registrarIntentoFallido();
            session()->setFlashdata('error', 'Correo o contrasena incorrectos.');
            return redirect()->to(base_url('/'));
        }

        $this->reiniciarIntentos();

        session()->regenerate(true);
        session()->set('usuario', [
            'correo' => $usuario['correo_electronico'],
            'rol'    => $usuario['rol'] ?? 'odontologo',
        ]);

        return redirect()->to(base_url('/Inicio'));
    }

    /**
     * Cierre de sesion.
     */
    public function logout()
    {
        session()->destroy();

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

    private function loginBloqueado(): bool
    {
        if ((int) session()->get('login_intentos', 0) < self::MAX_INTENTOS) {
            return false;
        }

        if (time() < (int) session()->get('login_bloqueo_hasta', 0)) {
            return true;
        }

        $this->reiniciarIntentos();

        return false;
    }

    private function registrarIntentoFallido(): void
    {
        $intentos = (int) session()->get('login_intentos', 0) + 1;

        session()->set('login_intentos', $intentos);
        session()->set('login_bloqueo_hasta', time() + self::SEGUNDOS_BLOQUEO);
    }

    private function reiniciarIntentos(): void
    {
        session()->remove(['login_intentos', 'login_bloqueo_hasta']);
    }
}
