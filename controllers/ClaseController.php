<?php

namespace Controllers;
use Models\Clase;
use Utils\Utils;
use Lib\Pages;


class ClaseController{
    private Pages $pages;

    function __construct(){
        $this->pages = new Pages();
    }

    public function gestion(){
        /**
         * Muestra todos los peliculas que existen. 
         * Esto solo está disponible para el admin
         * Redirigue al Gestionar películas
         */
        //Utils::isAdmin();
        
        $this->pages->render('clase/gestion');
    }

    // public function index() {
    //     /**
    //      * Muestra todas las peliculas en de la base de datos 
    //      * en el main 
    //      */
    //     $clase = new Clase();
    //     $clase = $clase->getAll();
    //     $this->pages->render('layout/main', ['clase' => $clase]);
        
    // }

    public function ver() {
        /**
         * Redirige a la vista ver
         * Obtiene los datos de la pelicula que se ha seleccionado
         * y los muestra, para luego comprarla 
         */
        
         $this->pages->render('clase/clases');
        
    }

    public function save() {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data']) && isset($_FILES['imagen']) ){

                $datos = $_POST['data'];
                $img = $_FILES['imagen'];
                $clase = new Clase();
                $clase_validada = $clase->validar($datos, $img);

                if(count($clase_validada) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $save = $clase->save($datos, $img);
                    $clase->crearCarpeta($img);
                
                    if($save) {
                        $_SESSION['crear_clase'] = 'complete';
                    }else{
                        $_SESSION['crear_clase'] = 'failed';
                    }
                }else{
                        $_SESSION['crear_clase'] = 'failed';
                }
                
            }
        }
        
        $this->pages->render('clase/crear');
    }


    

}