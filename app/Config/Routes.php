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



    //RUTAS CON ORACLE
    $routes->get('/test-oracle', 'COracle::PruebaOracle');
    $routes->get('/casos-clinicos', 'COracle::index');


    $routes->get('/casos-totales', 'COracle::casosClinicos');  // Ruta para ver todos los casos clínicos
    $routes->get('/casos-clinicos/paciente/(:num)', 'COracle::casosPaciente/$1');  // Ruta para ver casos de un paciente específico
    // Ruta para ver casos de un paciente específico

    $routes->get('/insertar-paciente', 'COracle::insertarPaciente');  // Ruta para mostrar el formulario
    $routes->post('/insertar-paciente', 'COracle::procesarInsertarPaciente');  // Ruta para procesar el formulario y guardar los datos
     // Ruta para procesar el formulario y guardar

