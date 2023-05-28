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

Router::add('GET', 'clase/clases', function(){
    return (new ClaseController())->mostrarClases();
});

Router::add('GET', 'clase/gestionClase', function(){
    return (new ClaseController())->gestion();
});

Router::add('GET', 'clase/crear', function(){
    return (new ClaseController())->save();
});

Router::add('POST', 'clase/crear', function(){
    return (new ClaseController())->save();
});


/*********************************************** */
/***********************BLOGS***************** */

Router::add('GET', 'blog/blogs', function(){
    return (new BlogController())->mostrarBlog();
});

Router::add('GET', 'blog/gestionBlog', function(){
    return (new BlogController())->gestion();
});

Router::add('GET', 'blog/crear', function(){
    return (new BlogController())->save();
});

Router::add('POST', 'blog/crear', function(){
    return (new BlogController())->save();
});




/*********************************************** */
/***********************USUARIO***************** */

Router::add('GET', 'usuario/gestionUsuario', function(){
    return (new UsuarioController())->gestion();
});


Router::add('GET', 'usuario/registro', function(){
    return (new UsuarioController())->registro();
});

Router::add('POST', 'usuario/registro', function(){
    return (new UsuarioController())->registro();
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


/***********************NAVEGACION *******************/
/*************************************************** */
Router::add('GET', 'navegacion/formulario', function(){
    return (new HomeController())->contacto();
});

Router::add('GET', 'navegacion/sobreNosotros', function(){
    return (new HomeController())->sobreNosotros();
});

Router::dispatch();