<?php

namespace Controllers;
use Models\Usuario;
use Lib\Pages;
use Lib\Router;
use Lib\Email;


class UsuarioController{
    private Pages $pages;

    function __construct(){
        $this->pages = new Pages();
        
    }

    public function mostrarEquipo() {
        $this->pages->render('usuario/nav-equipo');
    }

    public function gestion() {
        $this->pages->render('usuario/gestion');
    }

    public function save() {
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
                
                $registrado = $_POST['data'];
                
                $password = $_POST['data']['nombre'].'12!';
                $registrado['password'] = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
                
                $usuario = new Usuario();
                $usuario_validado = $usuario->validar_y_sanitizarRegistro($password);

            
                if(count($usuario_validado) == 0) {
                    /******************REGISTRAR******************** */
                    if(isset($_POST['registrar'])){

                        $usuario->setNombre($registrado['nombre']);
                        $usuario->setApellidos($registrado['apellidos']);
                        $usuario->setEmail($registrado['email']);
                        $usuario->setPassword($registrado['password']);
                        $usuario->setRol($registrado['rol']);
                        $save = $usuario->save();

            
                        $datos = array();
                        $datos['email'] = $registrado['email'];
                        $datos['password']= $password;
                    
                        if($save) {
                            $email = new Email();
                            $email->enviarEmail($datos);
                            $_SESSION['register'] = 'complete';
                        }else{
                            $_SESSION['register'] = 'failed';
                        }
                    }

                    /****************EDITAR************* */

                    elseif(isset($_SESSION['identity'])) {
                        $edit = $usuario->edit($_SESSION['identity']->id, $registrado['password'], $registrado['email']);
                    
                        if($edit){
                            $_SESSION['editar'] = 'complete';   
                        }else{
                            $_SESSION['editar'] = 'failed';
                        }   
                    }
                    else{
                        $_SESSION['editar'] = 'failed';
                    }   
                }else{
                    $_SESSION['register'] = 'failed';
                } 
            }
        }
        
        $this->pages->render('usuario/registro');
    }

    public function login() {
        /**
         * Se realiza el login del usuario
         * Se valida que el correo y la contraseña estén correctamente escritas
         * Si se loguea correctamente se crea la sesion  $_SESSION['identity']
         * y si el rol es admin se crea  $_SESSION['admin']
         */

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['data'])) {

                $auth = $_POST['data'];
                $usuario = new Usuario();
                $usuario->setEmail($_POST['data']['email']);
                $usuario->setPassword($_POST['data']['password']);
                $usuario_validado = $usuario->validar_y_sanitizarLogin();

                if(count($usuario_validado) == 0) {
                    $identity = $usuario->login();
                    if($identity && is_object($identity)) {
                        $_SESSION['identity'] = $identity;
                        
                        if($identity->rol == 'admin') {
                            $_SESSION['admin'] = true;
                          
                        }
                        else if($identity->rol == 'cliente') {
                            $_SESSION['cliente'] = true;
                          
                        }
                        else {
                            $_SESSION['empleado'] = true;
                        }
                        header('Location:'. $_ENV['base_url']);
                    }else{
                        $_SESSION['login'] = 'failed';
                    }


                }else{
                    $_SESSION['login'] = 'failed';

                }
                
        }
       
    }
    $this->pages->render('usuario/login');
}


public function perfil() {
    $this->pages->render('usuario/perfil');
}


public function editar() {

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
                $usuario = new Usuario();
            
                $usuario_validado = $usuario->validar_y_sanitizarRegistro();
            
                if(count($usuario_validado) == 0) {
                    
                        $usuario->setNombre($editado['nombre']);
                        $usuario->setApellidos($editado['apellidos']);
                        $usuario->setEmail($editado['email']);
                        
                        if(isset($_POST['data']['password'])) {
                            $usuario->setPassword($editado['password']['passwordNew']);
                           
                        }
                        
                        //$usuario->setRol($registrado['rol']);
                        $usuario->setFecha_nacimiento($editado['fecha_nacimiento']);
                        $usuario->setLugar_nacimiento($editado['lugar_nacimiento']);
                        $usuario->setDireccion($editado['direccion']);
                        $usuario->setTelefono($editado['telefono']);
                        $usuario->setTelefono2($editado['telefono2']);
                        $usuario->setSexo($editado['sexo']);
                        $usuario->setPatologias($editado['patologias']);
                        $usuario->setImagen($img['name']);
                        $edit = $usuario->edit();
                        $_SESSION['identity'] = $usuario->datosSession();
                        var_dump($_SESSION['identity'] );
                        die();
                        $usuario->crearCarpeta($img);
            
                        //$datos = array();
                        //$datos['email'] = $registrado['email'];
                        //$datos['password']= $password;
                    
                        if($edit) {
                            // $email = new Email();
                            // $email->enviarEmail($datos);
                            
                            $_SESSION['edit'] = 'complete';
                        }else{
                            $_SESSION['edit'] = 'failed';
                        }
                    

            
                }else{
                    $_SESSION['edit'] = 'failed';
                } 
            }
        }
        
        $this->pages->render('usuario/editar');

}

public function seleccionar($id){
    $usuario = new Usuario();
    $datos = $usuario->obtenerUsuario($id);
    $this->pages->render('usuario/ver',  ['datos' => $datos]);
    
}

public function delete($id){
    /**
     * Borra la pelicula seleccionada
     * con el id que se le pasa
     */
    
    $usuario = new Usuario();
    $delete = $usuario->borrar($id);
    $this->pages->render('usuario/gestion');
}

    public function logout(){
        /**
         * Se cierra la sesión del usuario, del admin y del carrito
         * y devuelve a la pagina principal
         */
        if(isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        if(isset($_SESSION['empleado'])) {
            unset($_SESSION['empleado']);
        }

        if(isset($_SESSION['cliente'])) {
            unset($_SESSION['cliente']);
        }

        header('Location:'. $_ENV['base_url']);
    }

}
