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
        $this->pages->render('clase/gestion');
    }
    

    public function obtenerDatosClase($id){
        /**
         * Muestra todos los peliculas que existen. 
         * Esto solo está disponible para el admin
         * Redirigue al Gestionar películas
         */
        //Utils::isAdmin();
        $clase = new Clase();
        $clase->setId($id);
        $datos = $clase->getOneClaseDatos();
        echo json_encode($datos);   
    }

    public function mostrarClases() {
        /**
         * Redirige a la vista ver
         * Obtiene los datos de la pelicula que se ha seleccionado
         * y los muestra, para luego comprarla 
         */
        
         $this->pages->render('navegacion/nav-clases');
        
    }

    public function formularioClase($dia, $horaInicio, $horaFin) {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        $datos = array();
        $datos['dia'] = $dia;
        $datos['horaInicio'] = $horaInicio;
        $datos['horaFin'] = $horaFin;
        
        $this->pages->render('clase/crear', ['datos' => $datos]);
    }

    public function save() {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        $clase = new Clase();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];
                $clase_validada = $clase->validar($datos);
                if(count($clase_validada) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $clase->setTitulo($datos['titulo']);
                    $clase->setPrecio($datos['precio']);
                    $clase->setCantidad($datos['cantidad']);
                    $clase->set_idProfesor($datos['id_usuario_profesor']);
                    $clase->set_idCategoria($datos['id_categoria']);
                    $save = $clase->save($datos);
                
                    if($save) {
                        $_SESSION['crear_clase'] = 'complete';
                    }else{
                        $_SESSION['crear_clase'] = 'failed';
                    }
                }else{
                    $_SESSION['crear_clase'] = $clase->errores;
                }
                
            }
        }
        $this->pages->render('clase/crear');
        
    }
    
    public function editar($id) {

        /**
             * Se guardan los datos de un nuevo empleado o de un usuario
             * que quiera editar sus datos.
             * La contraseña se encripta y se validan los datos. 
             * Si los datos están validados se crea o se edita el usuario
             * Si name es registrar, se crea un nuevo usuario
             * Si la $_SESSION['identity'] existe se edita el usuario
             */
            $clase = new Clase();
            $clase->setId($id);
             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['data'])) {
                    $datos = $_POST['data'];
                    $clase_validada = $clase->validar($datos);
                    if(count($clase_validada) == 0){
                        $clase->setTitulo($datos['titulo']);
                        $clase->setPrecio($datos['precio']);
                        $clase->setCantidad($datos['cantidad']);
                        $clase->set_idProfesor($datos['id_usuario_profesor']);
                        $clase->set_idCategoria($datos['id_categoria']);
                        $edit = $clase->edit();
                    
                        if($edit) {   
                            $_SESSION['editar_clase'] = 'complete';
                        }else{
                            $_SESSION['editar_clase'] = 'failed';
                        }
                    }else{
                        $_SESSION['editar_clase'] = $clase->errores;
                    } 
                }     
            }
            $datos = $clase->getOneClase();
            $this->pages->render('clase/editar', ['datos' => $datos]);
        }

    public function delete($id){
        /**
         * Borra la pelicula seleccionada
         * con el id que se le pasa
         */
        $clase = new Clase();
        $delete = $clase->borrar($id);
        $this->pages->render('clase/gestion');
    }

    // public function duplicar($id){
    //     /**
    //      * Borra la pelicula seleccionada
    //      * con el id que se le pasa
    //      */
        
    //     $clase = new Clase();
    //     $clase->setId($id);
    //     $datos = $clase->getOneClase();
    //     $duplicar = $clase->duplicar($datos);
        
    //     if($duplicar) {   
    //         $_SESSION['duplicar_clase'] = 'complete';
    //     }else{
    //         $_SESSION['duplicar_clase'] = 'failed';
    //     }
        
    //     $this->pages->render('clase/gestion');
    // }

}