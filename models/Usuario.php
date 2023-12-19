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
    private string $sexo;
    private string $patologias;
    private string $imagen;
    private string $rol;
    private string $profesion;
    private string $experiencia;
    private string $resumen;

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

    public function getSexo(): string{
        return $this->sexo;
    }

    public function setSexo(string $sexo){
        $this->sexo = $sexo;
    }

    public function getPatologias(): string{
        return $this->patologias ?? NULL;
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
    public function getProfesion(): string{
        return $this->profesion;
    }

    public function setProfesion(string $profesion){
        $this->profesion = $profesion;
    } 
    public function getExperiencia(): string{
        return $this->experiencia;
    }

    public function setExperiencia(string $experiencia){
        $this->experiencia = $experiencia;
    } 

    public function getResumen(): string{
        return $this->resumen;
    }

    public function setResumen(string $resumen){
        $this->resumen = $resumen;
    } 
    

    public static function obtenerProfesor(): object {
        $profesor = new Usuario();
        $profesores = $profesor->db->query("SELECT * FROM usuarios WHERE rol = 'admin' OR rol = 'empleado'");
        return $profesores;
    }

    public static function obtenerUsuarios(): object {
        $usuario = new Usuario();
        $usuarios = $usuario->db->query("SELECT * FROM usuarios 
        WHERE rol='cliente' 
        ORDER  BY id DESC");
        return $usuarios;
    }

    public function obtenerUsuario($id): object {
        $usuario = $this->db->query("SELECT * FROM usuarios WHERE id = $id");
        return $usuario;
    }

    public function save():bool{
        /**
         * Guarda los datos del nuevo usuario
         * Si es correcto devuelve true y si no devuelve false
         */

        $result = false;
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
            $result= false;
        }
       return $result;
    }


    public function validar($datos) {
        /**
         * Validacion del registro del nombre, apellido 
         * Nombre y apellido--> empezar por mayuscula y el resto en minuscula
         **/
        if((!preg_match('/^[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/', $datos['nombre'])) ) {
            $this->errores[] = "Nombre no válido";
        }

        if((!preg_match('/^[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/', $datos['apellidos'])) ) {
            $this->errores[] = "Apellidos no válido";
        }
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

    public function datosSession() {
        $result = false;
        $cons = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $cons->bindParam(':id', $_SESSION['identity']->id, PDO::PARAM_STR);
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


    public function edit() {
        $result = false;
        $ins = $this->db->prepare("UPDATE usuarios
        SET nombre = :nombre, 
        apellidos = :apellidos, 
        email = :email, 
        password = :password, 
        fecha_nacimiento = :fecha_nacimiento, 
        lugar_nacimiento = :lugar_nacimiento, 
        direccion = :direccion, 
        telefono = :telefono, 
        telefono2 = :telefono2, 
        sexo = :sexo, 
        patologias = :patologias, 
        imagen = :imagen, 
        profesion = :profesion,
        experiencia = :experiencia
        WHERE id = :id");


        $ins->bindParam( ':id', $id, PDO::PARAM_STR);
        $ins->bindParam( ':nombre', $nombre, PDO::PARAM_STR);
        $ins->bindParam( ':apellidos', $apellidos, PDO::PARAM_STR);
        $ins->bindParam( ':email', $email, PDO::PARAM_STR);
        $ins->bindParam( ':password', $password, PDO::PARAM_STR);
        $ins->bindParam( ':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
        $ins->bindParam( ':lugar_nacimiento', $lugar_nacimiento, PDO::PARAM_STR);
        $ins->bindParam( ':direccion', $direccion, PDO::PARAM_STR);
        $ins->bindParam( ':telefono', $telefono, PDO::PARAM_STR);
        $ins->bindParam( ':telefono2', $telefono2, PDO::PARAM_STR);
        $ins->bindParam( ':sexo', $sexo, PDO::PARAM_STR);
        $ins->bindParam( ':patologias', $patologias, PDO::PARAM_STR);
        $ins->bindParam( ':imagen', $imagen, PDO::PARAM_STR);
        $ins->bindParam( ':profesion', $profesion, PDO::PARAM_STR);
        $ins->bindParam( ':experiencia', $experiencia, PDO::PARAM_STR);
       
        
        $id = $_SESSION['identity']->id;
        $nombre= $this->getNombre();
        $apellidos= $this->getApellidos();
        $email= $this->getEmail();
        $fecha_nacimiento= $this->getFecha_nacimiento();
        $lugar_nacimiento= $this->getLugar_nacimiento();
        $direccion= $this->getDireccion();
        $telefono= $this->getTelefono();
        $telefono2 = $this->getTelefono2();
        $sexo= $this->getSexo();
        $patologias= $this->getPatologias();
        $profesion= $this->getProfesion();
        $experiencia= $this->getExperiencia();

        if($this->getImagen()== NULL) {
            //Devuelve la imagen de la pelicula según el id de ésta
            $im = $this->setImagenUsuario($id);
            $imagen = $im->imagen;

        }else{
            $imagen = $this->getImagen();   
        }

    
        /**Primero se comfirma que es la contraseña de la persona */
        if(isset($_POST['data']['password']['passwordOld'])) {
            $oldPassword = $_POST['data']['password']['passwordOld'];
            $usuarioDatos = $this->datosSession();
            $password = $usuarioDatos->password;
            $verify = password_verify($oldPassword, $password);

            if($verify) {
                $passwordNueva = $this->getPassword();
                $password = password_hash($passwordNueva, PASSWORD_BCRYPT, ['cost'=>4]);
                
            }else {
                $this->errores[] = "Contraseña incorrecta";
            }
            
        }
       

        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
        }

        
       return $result;
    }

    public function setImagenUsuario($id) {
        //Devuelve la imagen de una entrada
        $usuario = $this->db->query("SELECT imagen FROM usuarios 
        WHERE id={$id} ORDER BY id DESC;");
        return $usuario->fetch(PDO::FETCH_OBJ);
    }

    public function crearCarpeta($imagen) {
        /**
         * Guarda la imagen y crea la carpeta si no existe
         * La imagen debe ser de tipo jpg, jpeg o png
         */
        $nombre = $imagen['name'];
        $tipo = $imagen['type'];
      
        if($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png') {
            if(!is_dir('img')) {
                mkdir('img', 0777);
            }
            move_uploaded_file($imagen['tmp_name'], 'src/img/'.$nombre);
          
            
        }
    }

    public function borrar($id) {
        /**
         * Borra el usuario según el id 
         * que se le pasa 
         * Si se ha borrado devuelve true y si no devuelve false
         */
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $resul =  $this->db->prepare($sql);
        $resul->bindParam(':id', $id, PDO::PARAM_STR);
        try{
            $resul->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
        }

       return $result;
    }
}