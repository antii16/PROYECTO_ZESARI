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
        
        $this->pages->render('horario/gestion');
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
                // $clase = new Clase();
                $clase_validada = $clase->validar($datos);

                if(count($clase_validada) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $save = $clase->save($datos);
                
                    if($save) {
                        $_SESSION['crear_clase'] = 'complete';
                    }else{
                        $_SESSION['crear_clase'] = 'failed';
                    }
                }else{
                        $_SESSION['crear_clase'] = 'failed';
                }
                
            }
        }else{
            $this->pages->render('clase/crear');
        }
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
            $horario = new Horario();
            $horario->setId($id);
             if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['data'])) {
                    $editado = $_POST['data'];
                    $horario->setAforoDisponible($editado['aforo_disponible']);
                    $horario->setFecha($editado['fecha']);
                    $horario->set_idCategoria($editado['id_categoria']);
                    $edit = $horario->edit();
                
                    if($edit) {   
                        $_SESSION['edit_horario'] = 'complete';
                    }else{
                        $_SESSION['edit_horario'] = 'failed';
                    }
                }

                $this->pages->render('horario/gestion');
            }else {
                $datos = $horario->getOneHorario();
                $this->pages->render('horario/editar', ['datos' => $datos]);
            }
    }

    public function delete($id){
        /**
         * Borra la pelicula seleccionada
         * con el id que se le pasa
         */
        
        $horario = new Horario();
        $delete = $horario->borrar($id);
        $this->pages->render('horario/gestion');
    }

}