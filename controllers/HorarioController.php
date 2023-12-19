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
         * 
         */
        $horario = new Horario();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];
                $horario_validado = $horario->validar($datos);
                if(count($horario_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error
                    $i = count($datos['aforo_disponible']) -1; //654
                    for($fila=0;$fila <= $i; $fila++) {
                        foreach($datos as $dato) { 
                            $horario->setAforoDisponible($datos['aforo_disponible'][$fila]);
                            $horario->setFecha($datos['fecha'][$fila]);
                            $horario->set_idCategoria($datos['id_categoria'][$fila]);  
                        }
                        $save = $horario->save();
                    }
                    
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
        * Edita un único horario según in id
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

    public function editarTodo() {
    /**
     * Edita todo el horario
     */
    $horario = new Horario();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['data'])) {
            $datos = $_POST['data'];
            $horario_validado = $horario->validar($datos);
            if(count($horario_validado) == 0){
                $i = count($datos['aforo_disponible']) -1; //654
                        for($fila=0;$fila <= $i; $fila++) {
                            foreach($datos as $dato) { 
                            
                                $horario->setId($datos['id'][$fila]);
                                $horario->setAforoDisponible($datos['aforo_disponible'][$fila]);
                                $horario->setFecha($datos['fecha'][$fila]);
                                $horario->set_idCategoria($datos['id_categoria'][$fila]);    
                            }
                            $edit = $horario->edit();
                        }
            
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
    $this->pages->render('horario/editarTodo');
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
}