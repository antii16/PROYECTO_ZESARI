<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;


class Categoria{
    private string $id;
    private string $titulo;
    private string $descripcion;
    private string $imagen;

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


    public function getImagen(): string{
        return $this->imagen;
    }

    public function setImagen(string $imagen){
        $this->imagen = $imagen;
    }

    public static function obtenerCategorias(): object {
        /**
         * Se obtienen todas las categorias
         */
        $categoria = new Categoria();
        $categorias = $categoria->db->query("SELECT * FROM categorias");
        return $categorias;
    }

    public function getOneCategoria() {
        /**
         * Obtiene una categoría 
         */
        $categoria =  $this->db->query("SELECT * FROM categorias WHERE id = {$this->id}");
        return $categoria;
    }

    public function getImagenCategoria() {
        /**
         * Devuelve la imagen de una categoría
         */
        $categoria = $this->db->query("SELECT imagen FROM categorias 
        WHERE id={$this->id};");
        return $categoria->fetch(PDO::FETCH_OBJ);
    }

    public function validar($datos) {
        /**
         * Validacion de la categoria
         **/
        if(is_numeric($datos['titulo'])) {
            $this->errores[] = "El titulo debe ser texto";
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
            move_uploaded_file($imagen['tmp_name'], 'src/img/'.$nombre);
          
            
        }
    }
    public function save():bool{
        /**
         * Guarda los datos de una categoria
         * Si es correcto devuelve true y si no devuelve false
         */
        $ins = $this->db->prepare("INSERT INTO categorias(titulo, descripcion, imagen) VALUES (:titulo, :descripcion, :imagen)");
        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':descripcion', $descripcion, PDO::PARAM_STR);
        $ins->bindParam( ':imagen', $imagen, PDO::PARAM_STR);
  
        $titulo= $this->getTitulo();
        $descripcion= $this->getDescripcion();
        $imagen= $this->getImagen();

    
        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= $err;
        }
       return $result;
    }

    public function edit(){
        /**Edita una categoría */
        $ins = $this->db->prepare("UPDATE categorias
        SET titulo = :titulo, 
        descripcion = :descripcion, 
        imagen = :imagen
        WHERE id = :id");

        $ins->bindParam( ':id', $id, PDO::PARAM_STR);
        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':descripcion', $descripcion, PDO::PARAM_STR);
        $ins->bindParam( ':imagen', $imagen, PDO::PARAM_STR);

        $id = $this->getId();
        $titulo= $this->getTitulo();
        $descripcion= $this->getDescripcion();
        if($this->getImagen()== NULL) {
            //Devuelve la imagen de la pelicula según el id de ésta
            $im = $this->getImagenCategoria();
            $imagen = $im->imagen;
        }else{
            $imagen = $this->getImagen();   
        }

        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
        }

       return $result;

    }

    public function borrar($id) {
        /**
         * Borra una categoria según el id 
         * que se le pasa 
         * Si se ha borrado devuelve true y si no devuelve false
         */
        $sql = "DELETE FROM categorias WHERE id = :id";
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