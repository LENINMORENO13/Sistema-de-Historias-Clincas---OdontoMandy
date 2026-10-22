<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Restringe una ruta a usuarios con rol de administrador.
 */
class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $filters = null)
    {
        $usuario = session()->get('usuario');

        if (is_array($usuario) && ($usuario['rol'] ?? null) === 'admin') {
            return null;
        }

        return redirect()
            ->to(base_url('/Inicio'))
            ->with('error', 'Acceso restringido a administradores.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $filters = null)
    {
    }
}
