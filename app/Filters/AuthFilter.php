<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Exige una sesion autenticada para las rutas de la aplicacion.
 *
 * Antes de este filtro el login no persistia nada en sesion, por lo que
 * todas las rutas quedaban accesibles sin credenciales.
 */
class AuthFilter implements FilterInterface
{
    /**
     * Rutas accesibles sin sesion activa.
     */
    private array $publicRoutes = [
        '',
        'login/verificacionlogin',
        'logout',
    ];

    public function before(RequestInterface $request, $filters = null)
    {
        $usuario = session()->get('usuario');

        if (is_array($usuario) && ! empty($usuario['correo'])) {
            return null;
        }

        $path = trim($request->getPath(), '/');

        if (in_array($path, $this->publicRoutes, true)) {
            return null;
        }

        return redirect()
            ->to(base_url('/'))
            ->with('error', 'Debes iniciar sesion para continuar.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $filters = null)
    {
    }
}
