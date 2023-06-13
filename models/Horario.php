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
    private int $id_categoria;
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

    public function get_idCategoria(): int{
        return $this->id_categoria;
    }

    public function set_idCategoria(int $id_categoria){
        $this->id_categoria = $id_categoria;
    }
    public static function obtenerHorario() {
        /**
         * Selecciona los datos del horario
         */
        $horario = new Horario();
        $horario = $horario->db->query("SELECT * FROM horario ORDER BY id DESC;");
        return $horario;
    }

    public function getOneHorario() {
        /**Selecciona un horario */
        $horario =  $this->db->query("SELECT * FROM horario WHERE id = {$this->id}");
        return $horario;
    }

    public function comprobarAforo($id_horario) {
        /**Comprueba el aforo del horario */
        $consulta = $this->db->query("SELECT aforo_disponible FROM horario WHERE id = $id_horario");
        $aforo = $consulta->fetch(PDO::FETCH_OBJ);
        if($aforo->aforo_disponible > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function actualizarAforo($id_horario) {
        /**Actualiza el aforo cuando  un cliente se apunta */
        $consulta = $this->db->query("SELECT aforo_disponible FROM horario WHERE id = $id_horario");
        $aforo = $consulta->fetch(PDO::FETCH_OBJ);
        $aforoRestado = intval($aforo->aforo_disponible) - 1;
        $consulta = $this->db->query("UPDATE horario SET aforo_disponible = $aforoRestado WHERE id = $id_horario");

    }

    public static function obtenerHorarioPorCategoria($idCategoria) {
        // obtiene el horario por categoria
        $horario = new Horario();
        $query = "SELECT id, fecha FROM horario WHERE id_categoria = $idCategoria";
        $horarioFiltrado = $horario->db->query($query);
        
        return $horarioFiltrado;
    }
    public function save() {
        /**
         * Guarda los datos del horario
         */

        $ins = $this->db->prepare("INSERT INTO horario(aforo_disponible, fecha, id_categoria) 
        VALUES (:aforo_disponible, :fecha, :id_categoria)");

        $ins->bindParam( ':aforo_disponible', $aforo_disponible, PDO::PARAM_STR);
        $ins->bindParam( ':fecha', $fecha, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $aforo_disponible = $this->getAforoDisponible();
        $fecha = $this->getFecha();
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
         * Validacion del horario.
         **/

        if(isset($datos['aforo_disponible']) && !is_numeric($datos['aforo_disponible'])) {
            $this->errores[] = "El aforo debe ser un número";
        }
        if(isset($datos['id_categoria']) && $datos['id_categoria'] == 'selecciona') {
            $this->errores[] = "Selecciona una categoría";
        }
        if(isset($datos['id_horario']) && $datos['id_horario'] == 'selecciona') {
            $this->errores[] = "Selecciona un horario";
        }

        return  $this->errores;
    }

    public function apuntar($datos) {
        /**Apunta al usuario en un horario y actualiza el aforo  */
        $ins = $this->db->prepare("INSERT INTO apuntado(id_cliente, id_horario) 
        VALUES (:id_cliente, :id_horario)");

        $ins->bindParam( ':id_cliente', $id_cliente, PDO::PARAM_STR);
        $ins->bindParam( ':id_horario', $id_horario, PDO::PARAM_STR);
        
        $id_cliente = $datos['id_cliente'];
        $id_horario = $datos['id_horario'];

        $this->actualizarAforo($datos['id_horario']);
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
         * Borra el horario
         */
        $sql = "DELETE FROM horario WHERE id = :id";
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

    public function edit(){
        /**Edita el horario */
        $ins = $this->db->prepare("UPDATE horario
        SET 
        aforo_disponible = :aforo_disponible, 
        fecha = :fecha,
        id_categoria = :id_categoria
        WHERE id = :id");

        $ins->bindParam( ':id', $id, PDO::PARAM_STR);
        $ins->bindParam( ':aforo_disponible', $aforo_disponible, PDO::PARAM_STR);
        $ins->bindParam( ':fecha', $fecha, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $id = $this->getId();
        $aforo_disponible = $this->getAforoDisponible();
        $fecha = $this->getFecha();
        $id_categoria = $this->get_idCategoria();
    
        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
        }

       return $result;

    }
}