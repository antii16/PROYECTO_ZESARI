<?php

namespace Models;
use Lib\BaseDatos;
use Models\Categoria;
use PDO;
use PDOException;


class Horario{
    private int $id;
    private string $aforo_disponible;
    private string $fecha;
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

    public function getFecha(): string{
        return $this->fecha;
    }

    public function setFecha(string $fecha){
        $this->fecha = $fecha;
    }

    public function getAforoDisponible(): int{
        return $this->aforo_disponible;
    }

    public function setAforoDisponible(int $aforo_disponible){
        $this->aforo_disponible = $aforo_disponible;
    }

    public function get_idCategoria(): Categoria{
        return $this->id_categoria;
    }

    public function set_idCategoria(Categoria $id_categoria){
        $this->id_categoria = $id_categoria;
    }
    public static function obtenerHorario() {
        /**
         * Selecciona todos los peliculas
         */
        $horario = new Horario();
        $horario = $horario->db->query("SELECT * FROM horario ORDER BY id DESC;");
        return $horario;
    }

    public function getOneHorario() {
        $horario =  $this->db->query("SELECT * FROM horario WHERE id = {$this->id}");
        return $horario;
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

        $ins = $this->db->prepare("INSERT INTO horario(aforo_disponible, fecha, id_categoria) 
        VALUES (:aforo_disponible, :fecha, :id_categoria)");

        $ins->bindParam( ':aforo_disponible', $aforo_disponible, PDO::PARAM_STR);
        $ins->bindParam( ':fecha', $fecha, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $aforo_disponible = $datos['titulo'];
        $precio = $datos['precio'];
        $dia = $datos['dia'];
        $horaInicio = $datos['horaInicio'];
        $horaFin = $datos['horaFin'];
        $aforo = $datos['aforo'];
        $id_usuario_profesor = $datos['id_usuario_profesor'];
        $id_categoria = $datos['id_categoria'];
        
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

        if(!is_numeric($datos['aforo_disponible'])) {
            $this->errores[] = "El aforo debe ser un número";
        }


        return  $this->errores;
    }
   
    public function duplicar($datos) {
/**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

         $ins = $this->db->prepare("INSERT INTO clases(titulo, precio, horario, aforo, id_usuario_profesor, id_categoria) 
         VALUES (:titulo, :precio, :horario, :aforo, :id_usuario_profesor, :id_categoria)");
 
         $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
         $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
         $ins->bindParam( ':horario', $horario, PDO::PARAM_STR);
         $ins->bindParam( ':aforo', $aforo, PDO::PARAM_STR);
         $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
         $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        while($clase = $datos->fetch(PDO::FETCH_OBJ)){
            $titulo = $clase->titulo;
            $precio = $clase->precio;
            $dia =$clase->horario;
            $aforo = $clase->aforo;
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