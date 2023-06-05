<?php

namespace Controllers;
use Models\Pago;
use Utils\Utils;
use Lib\Pages;


class PagoController{
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
        
         $this->pages->render('blog/nav-blog');
        
    }

    public function save() {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];
                $pago = new Pago();
                $pago_validado = $pago->validar($datos);

                if(count($blog_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error
                    $save = $pago->save();
                
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
        
        $this->pages->render('pago/gestion');
    }

    public function  pagar($id) {
        $this->pages->render('pago/pagoUsuario', ['id' =>$id]);
}
    

}