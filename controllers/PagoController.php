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
         * Tabla de gestion de los pagos
         */
        
        $this->pages->render('pago/gestion');
    }
    public function save($id) {
        /**
         * Guarda el pago realizado con el id del cliente
         */
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                $datos = $_POST['data'];
                $pago = new Pago();
                $pago_validado = $pago->validar($datos);

                if(count($pago_validado) == 0){
                    //Si el $errores[] está vacío significa que no hay error
                   
                   $pago->setTipo($datos['tipo']);
                   $pago->setEstado($datos['estado']);
                   $pago->setCantidad($datos['cantidad']);
                   $pago->set_idCliente($id);
                   $pago->set_idClase($datos['id_clase']);
                    $save = $pago->save();
                
                    if($save) {
                        $_SESSION['crear_pago'] = 'complete';
                    }else{
                        $_SESSION['crear_pago'] = 'failed';
                    }
                }else{
                        $_SESSION['crear_pago'] = 'failed';
                }
                
            }
            
        }
        $this->pages->render('pago/pagoUsuario', ['id' =>$id]);
    }

    public function  pagar($id) {
        $this->pages->render('pago/pagoUsuario', ['id' =>$id]);
}

}