<?php
session_start();
require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;
use Lib\Router;
use Lib\Pages;
use Controllers\UsuarioController;
use Controllers\ClaseController;
use Controllers\BlogController;
use Controllers\CategoriaController;
use Controllers\PagoController;
use Controllers\HorarioController;
use Controllers\ApunteController;
use Utils\Utils;
$pages = new Pages();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// INDEX

Router::add('GET', '/', function(){
    return (new ClaseController())->index();
    
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

Router::add('GET', 'categoria/editar/:id', function($id){
    Utils::isAdmin();
    return (new CategoriaController())->editar($id);
});

Router::add('POST', 'categoria/editar/:id', function($id){
    Utils::isAdmin();
    return (new CategoriaController())->editar($id);
});

Router::add('GET', 'categoria/ver/:id', function($id){
    return (new CategoriaController())->ver($id);
});

Router::add('GET', 'categoria/borrar/:id', function($id){
    Utils::isAdmin();
    return (new CategoriaController())->delete($id);
});

/*********************************************** */
/***********************CLASES***************** */

Router::add('GET', 'clase/gestion', function(){
    Utils::isAdmin();
    return (new ClaseController())->gestion();
});

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

Router::add('POST', 'usuario/contactar', function(){
    return (new UsuarioController())->contactar_con_zesari();
});

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
    return (new ClaseController())->sobreNosotros();
});

Router::add('GET', 'contacto', function(){
    return (new ClaseController())->contacto();
});


/*********************************************** */
/***********************PAGO***************** */
Router::add('GET', 'pagar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->pagar($id);
});

Router::add('POST', 'pagar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->save($id);
});

Router::add('GET', 'pago/gestion', function(){
    Utils::isAdminOrEmpleado();
    return (new PagoController())->gestion();
});

/*********************************************** */
/***********************HORARIO***************** */

Router::add('GET', 'horario/crear_mes', function(){
    Utils::isAdminOrEmpleado();
    return (new HorarioController())->crear_mes();
});


Router::add('GET', 'horario/gestion', function(){
    Utils::isAdminOrEmpleado();
    return (new HorarioController())->gestion();
});

Router::add('GET', 'horario/crear', function(){
    Utils::isAdmin();
    return (new HorarioController())->save();
});

Router::add('POST', 'horario/crear', function(){
    Utils::isAdmin();
    return (new HorarioController())->save();
});

Router::add('GET', 'horario/editar/:id', function($id){
    Utils::isAdmin();
    return (new HorarioController())->editar($id);
});

Router::add('POST', 'horario/editar/:id', function($id){
    Utils::isAdmin();
    return (new HorarioController())->editar($id);
});

Router::add('GET', 'horario/editarTodo', function(){
    Utils::isAdmin();
    return (new HorarioController())->editarTodo();
});

Router::add('POST', 'horario/editarTodo', function(){
    Utils::isAdmin();
    return (new HorarioController())->editarTodo();
});

Router::add('GET', 'horario/borrar/:id', function($id){
    Utils::isAdmin();
    return (new HorarioController())->delete($id);
});

/**APUNTAR */
Router::add('GET', 'horario/apuntar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new ApunteController())->apuntar($id);
});

Router::add('POST', 'horario/apuntar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new ApunteController())->apuntar($id);
});

Router::add('GET', 'horario/desapuntar/:id', function($id){
    Utils::isAdminOrEmpleado();
    return (new ApunteController())->desapuntar($id);
});
Router::dispatch();