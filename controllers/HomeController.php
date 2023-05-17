<?php

namespace Controllers;
use Models\Clase;
use Utils\Utils;
use Lib\Pages;


class HomeController{
    private Pages $pages;

    function __construct(){
        $this->pages = new Pages();
    }

    public function index() {
        /**
         * Muestra todas las peliculas en de la base de datos 
         * en el main 
         */
        
        $this->pages->render('index');
    }

    public function contacto() {
        /**
         * Muestra todas las peliculas en de la base de datos 
         * en el main 
         */
        
        $this->pages->render('contacto/formulario');
    }

}