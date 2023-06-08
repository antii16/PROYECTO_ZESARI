<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;


class Blog{
    private string $id;
    private string $titulo;
    private string $descripcion;
    private string $texto;
    private string $fecha;
    private string $imagen;
    private string $id_usuario_empleado;
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

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function setTitulo(string $titulo){
        $this->titulo = $titulo;
    }

    public function getDescripcion(): string{
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getTexto(): string{
        return $this->texto;
    }

    public function setTexto(string $texto){
        $this->texto = $texto;
    }

    public function getFecha(): string{
        return $this->fecha;
    }

    public function setFecha(string $fecha){
        $this->fecha = $fecha;
    }


    public function getImagen(): string{
        return $this->imagen;
    }

    public function setImagen(string $imagen){
        $this->imagen = $imagen;
    }
   

    public function get_idUsuarioEmpleado(): int{
        return $this->id_usuario_empleado;
    }

    public function set_idUsuarioEmpleado(int $id_usuario_empleado){
        $this->id_usuario_empleado = $id_usuario_empleado;
    }


    public static function obtenerBlogs() {
        /**
         * Selecciona todos los peliculas
         */
        $blog = new Blog();
        $blogs = $blog->db->query("SELECT * FROM blogs ORDER BY id DESC");
        return $blogs;
    }

    public function getOneBlog() {
        $blog =  $this->db->query("SELECT * FROM blogs WHERE id = {$this->id}");
        return $blog;
    }

    public function save($datos, $img) {
        /**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

        

        $ins = $this->db->prepare("INSERT INTO blogs(titulo, descripcion, texto, fecha, imagen, id_usuario_empleado) 
        VALUES (:titulo, :descripcion, :texto, CURDATE(), :imagen, :id_usuario_empleado)");

        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':descripcion', $descripcion, PDO::PARAM_STR);
        $ins->bindParam( ':texto', $texto, PDO::PARAM_STR);
        // $ins->bindParam( ':fecha', $fecha, PDO::PARAM_STR);
        $ins->bindParam( ':imagen', $imagen, PDO::PARAM_STR);
        $ins->bindParam( ':id_usuario_empleado', $id_usuario_empleado, PDO::PARAM_STR);
        
        
        $titulo = $datos['titulo'];
        $descripcion = $datos['descripcion'];
        $texto = $datos['texto'];
        // $horario = $datos['fecha'];
        $imagen = $img['name'];
        $id_usuario_empleado = $_SESSION['identity']->id;
        
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
         * Validacion de la pelicula.
         * Valida el si los campos no están vacíos y que el stock y el precio son números
         * y no letras
         **/
        // if(!is_numeric($datos['precio'])) {
        //     $this->errores[] = "El precio debe ser un número";
        // }

        // if(!is_numeric($datos['aforo'])) {
        //     $this->errores[] = "El aforo debe ser un número";
        // }


        return  $this->errores;
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
            move_uploaded_file($imagen['tmp_name'], 'img/blog/'.$nombre);
          
            
        }
    }


}