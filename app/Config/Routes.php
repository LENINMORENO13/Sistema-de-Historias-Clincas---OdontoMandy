    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    //Ruta 
    $routes->get('/test', 'Home::pruebaconexion');




    //Ruta para el login
    $routes->get('/', 'Home::vistalogin');
    $routes->get('/Inicio', 'Home::MostrarDashboard');
    $routes->post('login/verificacionlogin', 'Home::verificacionlogin');




    //Rutas para los Pacientes
    $routes->get('/InsertPaciente', 'Home::MetodoVerFormularioUsuario');
    $routes->post('/Paciente', 'Home::MetodoInsertarUsuario');
    //Esta es la ruta para eliminar usuario
    $routes->get('/Eliminar/(:any)', 'Home::EliminarUsuarioFC/$1');
    // Esta e sla ruta para mostrar el formularo del select
    $routes->get('/Select', 'Home::SelectUsuarioFC');

    $routes->get('/Actualizar/(:any)', 'Home::ExtraerSelectUsuarioFC/$1');
    //Esta va aser la ruta para actualizar
    $routes->post('/Actualizar/Actualizado', 'Home::MetodoActualizarPacienteFC');



    //Rutas para los Casos Clinicos
    $routes->get('/VistaCC', 'CCasos::index');

    $routes->post('/InsertCC', 'CCasos::MetodoInsertarCaso');

    $routes->get('/SelectCasos', 'CCasos::SelectCasosFC');

    $routes->get('/EliminarCasos/(:any)', 'CCasos::EliminarCasoFC/$1');

    $routes->get('/ActualizarCaso/(:any)', 'CCasos::ExtraerSelectCasoFC/$1');
    //Esta va aser la ruta para actualizar
    $routes->post('/ActualizarCaso/Actualizado', 'CCasos::MetodoActualizarCasosFC');
    $routes->get('/CasosPacientes', 'CCasos::MostrarCasosConPacientes');


    //Rutas para el caso clinico detallado
    // $routes->get('/MostrarCD', 'CCasos::MetodoMostrarCasoDetallado');
    $routes->get('/MostrarCD/(:num)', 'CCasos::MetodoMostrarCasoDetallado/$1');
    $routes->post('/InsertarCD', 'CCasos::MetodoInsertarCasoDetallado');
    $routes->get('/FormularioDetallado/(:num)', 'CCasos::mostrarFormularioDetallado/$1');
    $routes->get('/ResumenHistorial/(:num)', 'CCasos::MetodoResumenHistorial/$1');







    // $routes->get('/hashear-claves', 'Home::convertirContraseñasAHASH');

