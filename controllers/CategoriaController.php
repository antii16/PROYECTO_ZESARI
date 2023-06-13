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
         * Tabla de gestión de categorías
         */
        
        $this->pages->render('categoria/gestion');
    }

    public function ver($id) {
        /**
         * Muestra una categoría en específico
         */
        $categoria = new Categoria();
        $categoria->setId($id);
        $categorias = $categoria->getOneCategoria();
        $this->pages->render('categoria/verCategoria', ['categorias' => $categorias]);
    }

    public function save() {
        /**
         * Guarda el categoría que se ha creado.
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
                        $_SESSION['crear_categoria'] = 'complete';
                    }else{
                        $_SESSION['crear_categoria'] = 'failed';
                    }
                }else{
                        $_SESSION['crear_categoria'] = $categoria->errores;
                }
                
            }
        }
        
        $this->pages->render('categoria/crear');
    }

    public function editar($id) {
    /**
         * Edita la categoría
         */
        $categoria = new Categoria();
        $categoria->setId($id);
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data']) && isset($_FILES['imagen']) ) {
                $datos = $_POST['data'];
                $img = $_FILES['imagen'];
                $categoria_validado = $categoria->validar($datos, $img);
                if(count($categoria_validado) == 0){
                    $categoria->setTitulo($datos['titulo']);
                    $categoria->setDescripcion($datos['descripcion']);
                    $categoria->setImagen($img['name']);
                    $edit = $categoria->edit();
                    $categoria->crearCarpeta($img);
                
                    if($edit) {   
                        $_SESSION['editar_categoria'] = 'complete';
                    }else{
                        $_SESSION['editar_categoria'] = 'failed';
                    }
                }else{
                    $_SESSION['editar_categoria'] = $categoria->errores;
                }
            }
        }
            $datos = $categoria->getOneCategoria();
            $this->pages->render('categoria/editar', ['datos' => $datos]);
        
    }

    public function delete($id){
        /**
         * Borra la categoría seleccionada
         * con el id que se le pasa
         */
        $categoria = new Categoria();
        $categoria->borrar($id);
        $this->pages->render('categoria/gestion');
    }
}