<?php

namespace Models;
use Lib\BaseDatos;
use Models\Categoria;
use PDO;
use PDOException;


class Clase{
    private int $id;
    private string $titulo;
    private string $precio;
    private string $cantidad;
    private int $id_usuario_profesor;
    private Categoria $id_categoria;
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

    public function getPrecio(): string{
        return $this->precio;
    }

    public function setPrecio(string $precio){
        $this->precio = $precio;
    }

    public function getCantidad(): int{
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad){
        $this->cantidad = $cantidad;
    }

    public function get_idProfesor(): int{
        return $this->id_usuario_profesor;
    }

    public function set_idProfesor(int $id_usuario_profesor){
        $this->id_usuario_profesor = $id_usuario_profesor;
    }

    public function get_idCategoria(): Categoria{
        return $this->id_categoria;
    }

    public function set_idCategoria(Categoria $id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function obtenerClasesHorario() {
        $sql = "SELECT * FROM clases";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        // Array para almacenar los datos de las clases
        $clases = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clases;
    }
    public static function obtenerClases() {
        /**
         * Selecciona todos los peliculas
         */
        $clase = new Clase();
        $clases = $clase->db->query("SELECT * FROM clases ORDER BY id DESC;");
        return $clases;
    }

    public function getOneClase() {
        $clase =  $this->db->query("SELECT * FROM clases WHERE id = {$this->id}");
        return $clase;
    }

    public function getOneClaseDatos() {
        //Devuelve la imagen de una entrada
        $clase = $this->db->query("SELECT * FROM clases WHERE id={$this->id};");

        return $clase->fetch(PDO::FETCH_OBJ);
    }

    public function comprobarAforo() {
        $consulta = "SELECT titulo,horario, aforo FROM clases 
        INNER JOIN pagos ON clases.id = pagos.id_cliente
        INNER JOIN usuarios ON pagos.id_cliente = usuarios.id
        WHERE rol = 'cliente'";
        $this->db->query($consulta);
      
    }
    public function save() {
        /**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

        $ins = $this->db->prepare("INSERT INTO clases(titulo, precio, cantidad, id_usuario_profesor, id_categoria) 
        VALUES (:titulo, :precio, :cantidad, :id_usuario_profesor, :id_categoria)");

        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
        $ins->bindParam( ':cantidad', $cantidad, PDO::PARAM_STR);
        $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $titulo = $this->getTitulo();
        $precio = $this->getPrecio();
        $cantidad = $this->getCantidad();
        $id_usuario_profesor = $this->get_idProfesor();
        $id_categoria = $this->get_idCategoria();
        
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
        if(!is_numeric($datos['precio'])) {
            $this->errores[] = "El precio debe ser un número";
        }

        if(!is_numeric($datos['aforo'])) {
            $this->errores[] = "El aforo debe ser un número";
        }


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
            move_uploaded_file($imagen['tmp_name'], 'src/img/clases/'.$nombre);
          
            
        }
    }
   
    public function duplicar($datos) {
/**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

         $ins = $this->db->prepare("INSERT INTO clases(titulo, precio, cantidad,id_usuario_profesor, id_categoria) 
         VALUES (:titulo, :precio, :cantidad, :id_usuario_profesor, :id_categoria)");
 
         $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
         $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
         $ins->bindParam( ':cantidad', $cantidad, PDO::PARAM_STR);
         $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
         $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        while($clase = $datos->fetch(PDO::FETCH_OBJ)){
            $titulo = $clase->titulo;
            $precio = $clase->precio;
            $cantidad =$clase->cantidad;
            $id_usuario_profesor = $clase->id_usuario_profesor;
            $id_categoria = $clase->id_categoria;
        }
        
         try{
             $ins->execute();
             $result = true;
         }catch(PDOException $err){
             $result= false;
             
         }
 
        return $result;
    }
}