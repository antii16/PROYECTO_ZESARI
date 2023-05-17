<?php
session_start();
require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;
use Lib\Router;
use Lib\Pages;
use Controllers\UsuarioController;
use Controllers\ClaseController;
use Controllers\HomeController;

$pages = new Pages();
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// INDEX

Router::add('GET', '/', function(){
    return (new HomeController())->index();
    
});

// CONTACTO
Router::add('GET', 'contacto/formulario', function(){
    return (new HomeController())->contacto();
});


/*********************************************** */
/***********************CLASES***************** */

Router::add('GET', 'clase/clases', function(){
    return (new ClaseController())->ver();
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
/***********************USUARIO***************** */

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



Router::dispatch();