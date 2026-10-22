<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Ruta para el login
$routes->get('/', 'Home::vistalogin');
$routes->post('login/verificacionlogin', 'Home::verificacionlogin');
$routes->get('/logout', 'Home::logout');

//Dashboard (requiere sesion)
$routes->get('/Inicio', 'Home::MostrarDashboard');


//Rutas para los Casos Clinicos
$routes->get('/VistaCC', 'CCasos::index');
$routes->post('/InsertCC', 'CCasos::MetodoInsertarCaso');
$routes->get('/SelectCasos', 'CCasos::SelectCasosFC');

$routes->get('/CasosPacientes', 'CCasos::MostrarCasosConPacientes');


//Rutas para el caso clinico detallado
$routes->get('/MostrarCD/(:num)', 'CCasos::MetodoMostrarCasoDetallado/$1');
$routes->post('/InsertarCD', 'CCasos::MetodoInsertarCasoDetallado');
$routes->get('/ResumenHistorial/(:num)', 'CCasos::MetodoResumenHistorial/$1');


//Rutas para la generacion de reportes
$routes->get('reportes/generar_reporte', 'Reportes::generar_reporte');
$routes->get('reporte/paciente/(:num)', 'Reportes::generarIndividual/$1' );

//Rutas para el registro de nuevos usuarios (solo administradores)
$routes->group('admin', ['filter' => 'requiereadmin'], static function ($routes) {
    $routes->get('registrar', 'CAdmin::mostrarFormularioRegistro');
    $routes->post('guardarUsuario', 'CAdmin::guardarUsuario');
});
