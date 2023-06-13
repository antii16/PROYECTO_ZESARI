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

    public function index() {
        /**
         * Muestra la página principal 
         */
        
        $this->pages->render('index');
    }
    public function contacto() {
        /**
         * Redirigue a la pagina contacto
         */
        
        $this->pages->render('navegacion/nav-contacto');
    }
    public function sobreNosotros() {
        /**
         * Redirigue a la página sobre nosotros
         */
        
        $this->pages->render('navegacion/nav-sobreNosotros');
    }

    public function gestion(){
        /**
         * Tabla de gestion de las clases
         */
        $this->pages->render('clase/gestion');
    }


    public function mostrarClases() {
        /**
         * Redirige a la página para ver las clases
         */
        
         $this->pages->render('navegacion/nav-clases');   
    }

    public function save() {
        /**
         * Guarda la clase que se ha creado.
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
         * Edita la clase
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
         * Borra la clase seleccionada
         * con el id que se le pasa
         */
        $clase = new Clase();
        $delete = $clase->borrar($id);
        $this->pages->render('clase/gestion');
    }
}