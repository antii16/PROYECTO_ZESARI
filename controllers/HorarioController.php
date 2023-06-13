<?php

namespace Controllers;
use Models\Horario;
use Models\Pago;
use Utils\Utils;
use Lib\Pages;


class HorarioController{
    private Pages $pages;

    function __construct(){
        $this->pages = new Pages();
    }

    public function gestion(){
        /**
         * Muestra la tabla de gestion de horario
         */
        
        $this->pages->render('horario/gestion');
    }

    public function save() {
        /**
         * Guarda el horario que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
         */
        $horario = new Horario();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];
                $horario_validado = $horario->validar($datos);

                if(count($horario_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error

                    $horario->setAforoDisponible($datos['aforo_disponible']);
                    $horario->setFecha($datos['fecha']);
                    $horario->set_idCategoria($datos['id_categoria']);
                    $save = $horario->save();
                
                    if($save) {
                        $_SESSION['crear_horario'] = 'complete';
                    }else{
                        $_SESSION['crear_horario'] = 'failed';
                    }
                }else{
                    $_SESSION['crear_horario'] = $horario->errores;
                }
                
            }
        }
        $this->pages->render('horario/crear');
        
    }
    
    public function editar($id) {

        /**
     * Edita el horario
     */
    $horario = new Horario();
    $horario->setId($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['data'])) {
            $datos = $_POST['data'];
            $horario_validado = $horario->validar($datos);
            if(count($horario_validado) == 0){
                $horario->setAforoDisponible($datos['aforo_disponible']);
                $horario->setFecha($datos['fecha']);
                $horario->set_idCategoria($datos['id_categoria']);

                $edit = $horario->edit();
            
                if($edit) {   
                    $_SESSION['editar_horario'] = 'complete';
                }else{
                    $_SESSION['editar_horario'] = 'failed';
                }
            }else{
                $_SESSION['editar_horario'] = $clase->errores;
            } 
        }     
    }
    $datos = $horario->getOneHorario();
    $this->pages->render('horario/editar', ['datos' => $datos]);
}

    public function delete($id){
        /**
         * Borra el horario seleccionada
         * con el id que se le pasa
         */
        $horario = new Horario();
        $delete = $horario->borrar($id);
        $this->pages->render('horario/gestion');
    }


    public function apuntar($id_cliente) {
        /**
         * Apunta a un usuario en un horario
         */
        $horario = new Horario();
        $pago = new Pago();
        $pago->set_idCliente($id_cliente);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];

                $apunte_validado = $horario->validar($datos);

                if(count($apunte_validado) == 0){
                    $id_horario = $datos['id_horario'];
                    $aforo = $horario->comprobarAforo($id_horario);
                    if($aforo) {
                        $save = $horario->apuntar($datos);
                        if($save) {
                            $_SESSION['apuntar'] = 'complete';
                        }else{
                            $_SESSION['apuntar'] = 'failed';
                        }
                    }else{
                        $horario->errores[] = "Clase llena";
                        $_SESSION['apuntar'] = $horario->errores;
                    }
                }else{
                    $_SESSION['apuntar'] = $horario->errores; 
                }
                   
            }
        }
        $datos = $pago->getAllPagos();
        $this->pages->render('horario/apuntar', ['datos' => $datos]);
    }


}