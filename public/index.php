<?php
session_start();
require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;
use Lib\Router;
use Lib\Pages;
use Controllers\UsuarioController;
use Controllers\ClaseController;
use Controllers\HomeController;
use Controllers\BlogController;
use Controllers\CategoriaController;
use Controllers\PagoController;
use Controllers\HorarioController;
use Utils\Utils;
$pages = new Pages();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// INDEX

Router::add('GET', '/', function(){
    return (new HomeController())->index();
    
});

/*********************************************** */
/***********************CATEGORIAS***************** */

Router::add('GET', 'categoria/gestion', function(){
    Utils::isAdmin();
    return (new CategoriaController())->gestion();
});

Router::add('GET', 'categoria/crear', function(){
    Utils::isAdmin();
    return (new CategoriaController())->save();
});

Router::add('POST', 'categoria/crear', function(){
    Utils::isAdmin();
    return (new CategoriaController())->save();
});

/*********************************************** */
/***********************CLASES***************** */

Router::add('GET', 'clase/gestion', function(){
    Utils::isAdmin();
    return (new ClaseController())->gestion();
});

// Router::add('GET', 'clase/crear/:dia/:horaInicio/:horaFin', function($dia, $horaInicio, $horaFin){
//     return (new ClaseController())->formularioClase($dia, $horaInicio, $horaFin);
// });
Router::add('POST', 'clase/crear', function(){
    Utils::isAdmin();
    return (new ClaseController())->save();
});

Router::add('GET', 'clase/crear', function(){
    Utils::isAdmin();
    return (new ClaseController())->save();
});

Router::add('GET', 'clase/borrar/:id', function($id){
    Utils::isAdmin();
    return (new ClaseController())->delete($id);
});
Router::add('GET', 'clase/editar/:id', function($id){
    Utils::isAdmin();
    return (new ClaseController())->editar($id);
});

Router::add('POST', 'clase/editar/:id', function($id){
    Utils::isAdmin();
    return (new ClaseController())->editar($id);
});

// Router::add('GET', 'clase/duplicar/:id', function($id){
//     return (new ClaseController())->duplicar($id);
// });

Router::add('GET', 'obtener_detalles_clase/:id', function($id){
    return (new ClaseController())->obtenerDatosClase($id);
});

/*********************************************** */
/***********************BLOGS***************** */


Router::add('GET', 'blog/gestion', function(){
    Utils::isAdmin();
    return (new BlogController())->gestion();
});

Router::add('GET', 'blog/crear', function(){
    Utils::isAdmin();
    return (new BlogController())->save();
});

Router::add('POST', 'blog/crear', function(){
    Utils::isAdmin();
    return (new BlogController())->save();
});

Router::add('GET', 'blog/ver/:id', function($id){
    Utils::isAdmin();
    return (new BlogController())->ver($id);
});

Router::add('GET', 'blog/borrar/:id', function($id){
    Utils::isAdmin();
    return (new BlogController())->delete($id);
});
Router::add('GET', 'blog/editar/:id', function($id){
    Utils::isAdmin();
    return (new BlogController())->editar($id);
});

Router::add('POST', 'blog/editar/:id', function($id){
    Utils::isAdmin();
    return (new BlogController())->editar($id);
});



/*********************************************** */
/***********************USUARIO***************** */

Router::add('GET', 'usuario/gestion', function(){ //acceder los empleados y admin
    Utils::isAdminOrEmpleado();
    return (new UsuarioController())->gestion();
});

Router::add('GET', 'usuario/login', function(){
    return (new UsuarioController())->login();
});

Router::add('POST', 'usuario/login', function(){
    return (new UsuarioController())->login();
});

// Router::add('GET', 'usuario/equipo', function(){ //ver
//     return (new UsuarioController())->mostrarEquipo();
// });

Router::add('GET', 'logout', function(){
    Utils::isIdentity();
    return (new UsuarioController())->logout();
});

Router::add('GET', 'perfil', function(){
    Utils::isIdentity();
    return (new UsuarioController())->perfil();
});

//CRUD

Router::add('GET', 'usuario/registro', function(){
    Utils::isAdminOrEmpleado();
    return (new UsuarioController())->save();
});

Router::add('POST', 'usuario/registro', function(){
    Utils::isAdminOrEmpleado();
    return (new UsuarioController())->save();
});
Router::add('GET', 'usuario/editar', function(){
    Utils::isIdentity();
    return (new UsuarioController())->editar();
});
Router::add('POST', 'usuario/editar', function(){
    Utils::isIdentity();
    return (new UsuarioController())->editar();
});
Router::add('GET', 'usuario/ver/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new UsuarioController())->seleccionar($id);
});

Router::add('GET', 'usuario/borrar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new UsuarioController())->delete($id);
});


/***********************NAVEGACION *******************/
/*************************************************** */


Router::add('GET', 'clases', function(){
    return (new ClaseController())->mostrarClases();
});

Router::add('GET', 'equipo', function(){
    return (new UsuarioController())->mostrarEquipo();
});

Router::add('GET', 'blogs', function(){
    return (new BlogController())->mostrarBlog();
});
Router::add('GET', 'sobreNosotros', function(){
    return (new HomeController())->sobreNosotros();
});

Router::add('GET', 'contacto', function(){
    return (new HomeController())->contacto();
});


/*********************************************** */
/***********************PAGO***************** */
Router::add('GET', 'pagar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->pagar($id);
});

Router::add('POST', 'pagar', function(){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->save();
});

Router::add('GET', 'pago/gestion', function(){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->gestion();
});

/*********************************************** */
/***********************HORARIO***************** */
Router::add('GET', 'horario/gestion', function(){
    Utils::isAdminOrEmpleado();
    return (new HorarioController())->gestion();
});

Router::dispatch();