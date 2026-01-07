    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */

    //Ruta de test 
    $routes->get('/test', 'Home::pruebaconexion');



    //Ruta para el login
    $routes->get('/', 'Home::vistalogin');
    $routes->get('/Inicio', 'Home::MostrarDashboard');
    $routes->post('login/verificacionlogin', 'Home::verificacionlogin');



    //Rutas para los Pacientes
    $routes->get('/InsertPaciente', 'Home::MetodoVerFormularioUsuario');
    $routes->post('/Paciente', 'Home::MetodoInsertarUsuario');
    $routes->get('/Actualizar/(:any)', 'Home::ExtraerSelectUsuarioFC/$1');



    //Rutas para los Casos Clinicos
    $routes->get('/VistaCC', 'CCasos::index');
    $routes->post('/InsertCC', 'CCasos::MetodoInsertarCaso');
    $routes->get('/SelectCasos', 'CCasos::SelectCasosFC');

    $routes->get('/ActualizarCaso/(:any)', 'CCasos::ExtraerSelectCasoFC/$1');
    $routes->post('/ActualizarCaso/Actualizado', 'CCasos::MetodoActualizarCasosFC');
    $routes->get('/CasosPacientes', 'CCasos::MostrarCasosConPacientes');


    //Rutas para el caso clinico detallado
    $routes->get('/MostrarCD/(:num)', 'CCasos::MetodoMostrarCasoDetallado/$1');
    $routes->post('/InsertarCD', 'CCasos::MetodoInsertarCasoDetallado');
    $routes->get('/FormularioDetallado/(:num)', 'CCasos::mostrarFormularioDetallado/$1');
    $routes->get('/ResumenHistorial/(:num)', 'CCasos::MetodoResumenHistorial/$1');


    //Rutas para la generacion de reportes
    $routes->get('reportes/generar_reporte', 'Reportes::generar_reporte');
    $routes->get('reporte/paciente/(:num)','Reportes::generarIndividual/$1' );

    //Rutas para el regitro de nuevos usuarios
    $routes->get('admin/registrar', 'CAdmin::mostrarFormularioRegistro');
    $routes->post('admin/guardarUsuario', 'CAdmin::guardarUsuario');



