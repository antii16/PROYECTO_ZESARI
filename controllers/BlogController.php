<?php

namespace Controllers;
use Models\Blog;
use Utils\Utils;
use Lib\Pages;


class BlogController{
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
        
        $this->pages->render('blog/gestion');
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

    public function mostrarBlog() {
        /**
         * Redirige a la vista ver
         * Obtiene los datos de la pelicula que se ha seleccionado
         * y los muestra, para luego comprarla 
         */
        
         $this->pages->render('navegacion/nav-blog');
        
    }

    public function ver($id) {
        $blog = new Blog();
        $blog->setId($id);
        $blogs = $blog->getOneBlog();
        $this->pages->render('blog/verBlog', ['blogs' => $blogs]);
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
                $blog = new Blog();
                $blog_validado = $blog->validar($datos, $img);

                if(count($blog_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $save = $blog->save($datos, $img);
                    $blog->crearCarpeta($img);
                
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
        
        $this->pages->render('blog/crear');
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
               
             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['data'])) {
                    
                    $editado = $_POST['data'];
                    $img = $_FILES['imagen'];
                    $blog = new Blog();
                
                    $blog->setId($id);
                    $blog->setTitulo($editado['titulo']);
                    $blog->setDescripcion($editado['descripcion']);
                    $blog->setTexto($editado['texto']);
                    $blog->setImagen($img['name']);
                    $edit = $blog->edit();
                    $blog->crearCarpeta($img);
                
                    if($edit) {   
                        $_SESSION['edit_blog'] = 'complete';
                    }else{
                        $_SESSION['edit_blog'] = 'failed';
                    }
                }

                $this->pages->render('blog/gestion');
            }else {
                $blog = new Blog();
                $blog->setId($id);
                $datos = $blog->getOneBlog();
                $this->pages->render('blog/editar', ['datos' => $datos]);
            }
    }

    public function delete($id){
        /**
         * Borra la pelicula seleccionada
         * con el id que se le pasa
         */
        
        $blog = new Blog();
        $delete = $blog->borrar($id);
        $this->pages->render('blog/gestion');
    }
}