<?php

namespace Controllers;
use Models\Apunte;
use Models\Horario;
use Models\Pago;
use Utils\Utils;
use Lib\Pages;


class ApunteController{
    private Pages $pages;

    function __construct(){
        $this->pages = new Pages();
    }
    public function apuntar($id_cliente) {
        /**
         * Apunta a un usuario en un horario
         */
        $horario = new Horario();
        $pago = new Pago();
        $apunte = new Apunte();
        $pago->set_idCliente($id_cliente);
        $_SESSION['id_cliente'] = $id_cliente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])){
                
                $datos = $_POST['data'];
                $apunte_validado = $horario->validarApunte($datos); 
                if(count($apunte_validado) == 0){
                    $i = count($datos['id_horario'])-1;
                    for($fila=0;$fila <= $i; $fila++) {
                        
                        $id_cliente = $datos['id_cliente'][$fila];
                        $id_horario = $datos['id_horario'][$fila];
                        
                        $id_categoria = $horario->conseguirIdCategoria($id_horario);
                        $aforo = $horario->comprobarAforo($id_horario);
                        $cantidad = Apunte::cantidadApunte($id_cliente, $id_categoria->id_categoria);
                        $pagos = Pago::getAllPagos($id_cliente);
                        $clases_total = $pagos[0]->n_clases_apuntar - $cantidad->cantidad_horario;
                    
                        //Si han sido apuntadas todas las clases del alumno, no permite más. 
                        if($clases_total != 0){
                            if($aforo){
                                //$horario->setId($datos['id'][$fila]);
                                $apunte->set_idHorario($datos['id_horario'][$fila]);
                                $apunte->set_idCliente($datos['id_cliente'][$fila]);
                                $save = $apunte->apuntar();
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
                            $horario->errores[] = "Todas las clases han sido apuntadas";
                            $_SESSION['apuntar'] = $horario->errores;
                        }          
                    }

                    
                }else{
                    $_SESSION['apuntar'] = $horario->errores; 
                }
                   
            }
        }

        $datos = $pago->getAllPagos($id_cliente);
        if($datos){
            $this->pages->render('horario/apuntar', ['datos' => $datos]);
        }
        else{
            $this->pages->render('usuario/gestion');
        }
    }


    public function desapuntar($id_apuntado) {
        /**
         * Desapunta a un usuario en un horario
         */

        $pago = new Pago();
        $apunte = new Apunte();
        $apunte->setId($id_apuntado);
        $delete = $apunte->borrar();
        $datos = $pago->getAllPagos($_SESSION['id_cliente']);
        if($delete){
            $this->pages->render('horario/apuntar', ['datos' => $datos]);
        }
        else{
            $this->pages->render('usuario/gestion');
        }
    }
}