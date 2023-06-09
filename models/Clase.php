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
    private string $horario;
    private string $aforo;
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

    public function getHorario(): string{
        return $this->horario;
    }

    public function setHorario(string $horario){
        $this->horario = $horario;
    }

    public function getAforo(): int{
        return $this->aforo;
    }

    public function setAforo(int $aforo){
        $this->aforo = $aforo;
    }

    public function getCantidadMes(): int{
        return $this->cantidad_mes;
    }

    public function setCantidadMes(int $cantidad_mes){
        $this->cantidad_mes = $cantidad_mes;
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


    public static function obtenerClases() {
        /**
         * Selecciona todos los peliculas
         */
        $clase = new Clase();
        $clases = $clase->db->query("SELECT * FROM clases ORDER BY id DESC;");
        return $clases;
    }

    public function comprobarAforo() {
        $consulta = "SELECT titulo,horario, aforo FROM clases 
        INNER JOIN pagos ON clases.id = pagos.id_cliente
        INNER JOIN usuarios ON pagos.id_cliente = usuarios.id
        WHERE rol = 'cliente'";
        $this->db->query($consulta);
      
    }
    public function save($datos) {
        /**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

        $ins = $this->db->prepare("INSERT INTO clases(titulo, precio, horario, aforo, cantidad_mes, id_usuario_profesor, id_categoria) 
        VALUES (:titulo, :precio, :horario, :aforo, :cantidad_mes, :id_usuario_profesor, :id_categoria)");

        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
        $ins->bindParam( ':horario', $horario, PDO::PARAM_STR);
        $ins->bindParam( ':aforo', $aforo, PDO::PARAM_STR);
        $ins->bindParam( ':cantidad_mes', $cantidad_mes, PDO::PARAM_STR);
        $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $titulo = $datos['titulo'];
        $precio = $datos['precio'];
        $horario = $datos['horario'];
        $aforo = $datos['aforo'];
        $cantidad_mes = $datos['cantidad_mes'];
        $id_usuario_profesor = $datos['id_usuario_profesor'];
        $id_usuario_profesor = $datos['id_categoria'];
        
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
   
}