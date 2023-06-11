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
             * Se guardan los datos de un nuevo empleado o de un usuario
             * que quiera editar sus datos.
             * La contraseña se encripta y se validan los datos. 
             * Si los datos están validados se crea o se edita el usuario
             * Si name es registrar, se crea un nuevo usuario
             * Si la $_SESSION['identity'] existe se edita el usuario
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
         * Borra la pelicula seleccionada
         * con el id que se le pasa
         */
        $clase = new Clase();
        $delete = $clase->borrar($id);
        $this->pages->render('clase/gestion');
    }


    public function apuntar($id_cliente) {
        /**
         * Guarda el pelicula que se ha creado.
         * La imagen se guarda en una carpeta. Si la carpeta no se ha creado, se crea
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