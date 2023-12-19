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
         * Tabla de gestión de blogs
         */
        
        $this->pages->render('blog/gestion');
    }
    public function mostrarBlog() {
        /**
         * Muestra todos los blogs al usuario
         */
        
         $this->pages->render('navegacion/nav-blog');
        
    }

    public function ver($id) {
        /**
         * Para ver un blog en particular
         */
        $blog = new Blog();
        $blog->setId($id);
        $blogs = $blog->getOneBlog();
        $this->pages->render('blog/verBlog', ['blogs' => $blogs]);
    }

    public function save() {
        /**
         * Guarda el blog que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data']) && isset($_FILES['imagen']) ){
                $creado = $_POST['data'];
                $img = $_FILES['imagen'];
                $blog = new Blog();
        
                $blog->setTitulo($creado['titulo']);
                $blog->setDescripcion($creado['descripcion']);
                $blog->setTexto($creado['texto']);
                $blog->setImagen($img['name']);
                $save = $blog->save();
                $blog->crearCarpeta($img);
            
                if($save) {   
                    $_SESSION['crear_blog'] = 'complete';
                }else{
                    $_SESSION['crear_blog'] = 'failed';
                }
            }
        } 
        $this->pages->render('blog/crear');
    }

    public function editar($id) {
        /**
         * Se editan los datos del blog seleccionado
        */

        $blog = new Blog();
        $blog->setId($id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['data']) && isset($_FILES['imagen']) ) {
            
            $editado = $_POST['data'];
            $img = $_FILES['imagen'];

            $blog->setTitulo($editado['titulo']);
            $blog->setDescripcion($editado['descripcion']);
            $blog->setTexto($editado['texto']);
            $blog->setImagen($img['name']);
            $edit = $blog->edit();
            $blog->crearCarpeta($img);
        
            if($edit) {   
                $_SESSION['editar_blog'] = 'complete';
            }else{
                $_SESSION['editar_blog'] = 'failed';
            }
        }
        }
    $datos = $blog->getOneBlog();
    $this->pages->render('blog/editar', ['datos' => $datos]);
    }

    public function delete($id){
        /**
         * Borra el blog seleccionada
         * con el id que se le pasa
         */
        
        $blog = new Blog();
        $blog->borrar($id);
        $this->pages->render('blog/gestion');
    }
}