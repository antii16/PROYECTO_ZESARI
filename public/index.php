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

$pages = new Pages();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// INDEX

Router::add('GET', '/', function(){
    return (new HomeController())->index();
    
});

/*********************************************** */
/***********************CATEGORIAS***************** */

Router::add('GET', 'categoria/gestionCategoria', function(){
    return (new CategoriaController())->gestion();
});

Router::add('GET', 'categoria/crear', function(){
    return (new CategoriaController())->save();
});

Router::add('POST', 'categoria/crear', function(){
    return (new CategoriaController())->save();
});

/*********************************************** */
/***********************CLASES***************** */

Router::add('GET', 'clase/gestionClase', function(){
    return (new ClaseController())->gestion();
});

Router::add('GET', 'clase/crear/:dia/:horaInicio/:horaFin', function($dia, $horaInicio, $horaFin){
    return (new ClaseController())->formularioClase($dia, $horaInicio, $horaFin);
});
Router::add('POST', 'clase/crear', function(){
    return (new ClaseController())->save();
});


/*********************************************** */
/***********************BLOGS***************** */


Router::add('GET', 'blog/gestionBlog', function(){
    return (new BlogController())->gestion();
});

Router::add('GET', 'blog/crear', function(){
    return (new BlogController())->save();
});

Router::add('POST', 'blog/crear', function(){
    return (new BlogController())->save();
});

Router::add('GET', 'blog/ver/:id', function($id){
    return (new BlogController())->ver($id);
});



/*********************************************** */
/***********************USUARIO***************** */

Router::add('GET', 'usuario/gestionUsuario', function(){
    return (new UsuarioController())->gestion();
});

Router::add('GET', 'usuario/login', function(){
    return (new UsuarioController())->login();
});

Router::add('POST', 'usuario/login', function(){
    return (new UsuarioController())->login();
});

Router::add('GET', 'usuario/equipo', function(){
    return (new UsuarioController())->mostrarEquipo();
});

Router::add('GET', 'logout', function(){
    return (new UsuarioController())->logout();
});

Router::add('GET', 'perfil', function(){
    return (new UsuarioController())->perfil();
});

//CRUD

Router::add('GET', 'usuario/registro', function(){
    return (new UsuarioController())->save();
});

Router::add('POST', 'usuario/registro', function(){
    return (new UsuarioController())->save();
});
Router::add('GET', 'usuario/editar', function(){
    return (new UsuarioController())->editar();
});
Router::add('POST', 'usuario/editar', function(){
    return (new UsuarioController())->editar();
});
Router::add('GET', 'usuario/ver/:id', function($id){
    return (new UsuarioController())->seleccionar($id);
});

Router::add('GET', 'usuario/borrar/:id', function($id){
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
    return (new PagoController())->pagar($id);
});

Router::add('POST', 'pagar', function(){
    return (new PagoController())->save();
});

Router::add('GET', 'pago/gestionPago', function(){
    return (new PagoController())->gestion();
});

/*********************************************** */
/***********************HORARIO***************** */
Router::add('GET', 'clase/gestionHorario', function(){
    return (new ClaseController())->gestionHorario();
});

Router::dispatch();