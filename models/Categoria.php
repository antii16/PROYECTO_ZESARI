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
        $categoria = new Categoria();
        $categorias = $categoria->db->query("SELECT * FROM categorias");
        return $categorias;
    }


    public function save():bool{
        /**
         * Guarda los datos del nuevo usuario
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
            move_uploaded_file($imagen['tmp_name'], 'src/img/'.$nombre);
          
            
        }
    }

}