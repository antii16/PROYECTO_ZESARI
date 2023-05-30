<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;


class Usuario{
    private string $id;
    private string $nombre;
    private string $apellidos;
    private string $email;
    private string $password;
    private string $fecha_nacimiento;
    private string $lugar_nacimiento;
    private string $direccion;
    private string $telefono;
    private string $telefono2;
    private string $n_seguridad_social;
    private string $sexo;
    private string $patologias;
    private string $imagen;
    private string $rol;

    private BaseDatos $db;

    public function __construct()
    {
        $this->db = new BaseDatos();
        $this->errores = [];

    }


    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getApellidos(): string{
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos){
        $this->apellidos = $apellidos;
    }


    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }


    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getFecha_nacimiento(): string{
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento(string $fecha_nacimiento){
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getLugar_nacimiento(): string{
        return $this->lugar_nacimiento;
    }

    public function setLugar_nacimiento(string $lugar_nacimiento){
        $this->lugar_nacimiento = $lugar_nacimiento;
    }

    public function getDireccion(): string{
        return $this->direccion;
    }

    public function setDireccion(string $direccion){
        $this->direccion = $direccion;
    }

    public function getTelefono(): string{
        return $this->telefono;
    }

    public function setTelefono(string $telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono2(): string{
        return $this->telefono2;
    }

    public function setTelefono2(string $telefono2){
        $this->telefono2 = $telefono2;
    }

    public function getN_seguridad_social(): string{
        return $this->n_seguridad_social;
    }

    public function setN_seguridad_social(string $n_seguridad_social){
        $this->n_seguridad_social = $n_seguridad_social;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo){
        $this->sexo = $sexo;
    }

    public function getPatologias(): string{
        return $this->patologias;
    }

    public function setPatologias(string $patologias){
        $this->patologias = $patologias;
    }

    public function getImagen(): string{
        return $this->imagen;
    }

    public function setImagen(string $imagen){
        $this->imagen = $imagen;
    } 

    public function getRol(): string{
        return $this->rol;
    }

    public function setRol(string $rol){
        $this->rol = $rol;
    } 

    public static function obtenerProfesor(): object {
        $profesor = new Usuario();
        $profesores = $profesor->db->query("SELECT * FROM usuarios WHERE rol = 'admin' OR rol = 'empleado'");
        return $profesores;
    }

    public static function obtenerUsuarios(): object {
        $usuario = new Usuario();
        $usuarios = $usuario->db->query("SELECT * FROM usuarios ORDER  BY id DESC");
        return $usuarios;
    }


    public function save():bool{
        /**
         * Guarda los datos del nuevo usuario
         * Si es correcto devuelve true y si no devuelve false
         */
        $ins = $this->db->prepare("INSERT INTO usuarios(nombre, apellidos, email, password, rol) VALUES (:nombre, :apellidos, :email, :password, :rol)");
        $ins->bindParam( ':nombre', $nombre, PDO::PARAM_STR);
        $ins->bindParam( ':apellidos', $apellidos, PDO::PARAM_STR);
        $ins->bindParam( ':email', $email, PDO::PARAM_STR);
        $ins->bindParam( ':password', $password, PDO::PARAM_STR);
        $ins->bindParam( ':rol', $rol, PDO::PARAM_STR);
       
        
        $nombre= $this->getNombre();
        $apellidos= $this->getApellidos();
        $email= $this->getEmail();
        $password= $this->getPassword();
        $rol = $this->getRol();
    
        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= $err;
        }
       return $result;
    }


    public function validar_y_sanitizarRegistro($password) {
        // /**
        //  * Validacion del registro del nombre, apellido, contraseña y del correo 
        //  * Nombre y apellido--> empezar por mayuscula y el resto en minuscula
        //  **/
        // if(!$this->nombre) {
        //     $this->errores[] = "El nombre del usuario es obligatorio";
        // }

        // if((!preg_match('/^[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/', $this->nombre)) ) {
        //     $this->errores[] = "Nombre no válido";
        // }

        // if(!$this->apellidos) {
        //     $this->errores[] = "El apellido del usuario es obligatorio";
        // }

        // if((!preg_match('/^[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/', $this->apellidos)) ) {
        //     $this->errores[] = "Apellido no válido";
        // }


        // if(!$this->email) {
        //     $this->errores[] = "El email del usuario es obligatorio";
        // }else{
        //     $correo = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        //     if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        //         $this->errores[] = 'El campo email no es correcto';
        //     }
        // }

        // //title="Se acepta espacios en blanco. Al menos una minúscula, una mayúscula, un número y un carácter especial ( ! @ # $ % ^ & * _ = + - . ) "
        // if((!preg_match('/[-\sa-zA-Z0-9!@#$%^&*=+.]+/', $password)) ) {
        //     $this->errores[] = "Contraseña no válida";
        // }

        // if(!$password) {
        //     $this->errores[] = "La contraseña del usuario es obligatoria";
        // }

        return  $this->errores;
    }

    public function login():bool|object{
        /**
         * Realiza el login del usuario, verificando si al contraseña es la 
         * del usuario
         * Devuelve los datos del usuario si se ha verificado, sino devuelve false
         */
        $result = false;
        $email= $this->email;
        $password = $this->password;
        $usuario = $this->buscaMail($email);
     
        if($usuario !== false) { 
            $verify = password_verify($password, $usuario->password);
            if($verify) {
                $result= $usuario;
            }
        }
        return $result;
    }

    public function buscaMail($email):bool|object {
        /**
         * Busca el mail del usuario con el objetivo 
         * de verificar si ese email coincide con la contraseña del usuario
         */
        $result = false;
        $cons = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $cons->bindParam(':email', $email, PDO::PARAM_STR);
        try{
            $cons->execute();
            if($cons && $cons->rowCount() ==1) {
                $result = $cons->fetch(PDO::FETCH_OBJ);
            }
        }catch(PDOException $err) {
            $result = false;
        }
        return $result;
    }

    public function validar_y_sanitizarLogin() {
        /**
         * Validacion del login, comprobando que los campos estén
         * correctos
         */
        if(!$this->email) {
            $this->errores[] = "El email del usuario es obligatorio";
        }else{
            $correo = filter_var($this->email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $this->errores[] = 'El campo email no es correcto';
            }
        }

        if(!$this->password) {
            $this->errores[] = "Contraseña incorrecta";
        }

        return  $this->errores;
    }
}