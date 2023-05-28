<?php

namespace Controllers;
use Models\Categoria;
use Utils\Utils;
use Lib\Pages;


class CategoriaController{
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
        
        $this->pages->render('categoria/gestion');
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

    public function save() {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data']) && isset($_FILES['imagen']) ){
                $datos = $_POST['data'];
                $img = $_FILES['imagen'];
                $categoria = new Categoria();
                $categoria_validado = $categoria->validar($datos, $img);

                if(count($categoria_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $categoria->setTitulo($datos['titulo']);
                    $categoria->setDescripcion($datos['descripcion']);
                    $categoria->setImagen($img['name']);


                    $save = $categoria->save();
                    $categoria->crearCarpeta($img);
                
                    if($save) {
                        $_SESSION['crear_blog'] = 'complete';
                    }else{
                        $_SESSION['crear_blog'] = 'failed';
                    }
                }else{
                        $_SESSION['crear_blog'] = 'failed';
                }
                
            }
        }
        
        $this->pages->render('categoria/crear');
    }
}