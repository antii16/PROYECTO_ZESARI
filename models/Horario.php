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
         * Se utiliza en editarTodo y en gestion 
         */
        $horario = new Horario();
        $horario = $horario->db->query("SELECT * FROM horario ORDER BY id DESC;");
        return $horario;
    }

    public static function clasesUsuario($id_cliente, $id_categoria) {
        /**
         * Selecciona las clases a las que está apuntado el cliente
         * según su categoría 
         * 
        */
        $horario = new Horario();
        $query = "SELECT fecha, 
        COUNT(horario.id) AS cantidad_horario,
        apuntado.id AS id_apuntado
        FROM horario 
        INNER JOIN apuntado ON apuntado.id_horario = horario.id
        WHERE id_cliente = {$id_cliente}
        AND id_categoria = {$id_categoria}
        GROUP BY fecha";

        $horario =  $horario->db->query($query);
        return $horario;
    }

    public function conseguirIdCategoria($id_horario) {
        /**
         * Selecciona el id de un horario. 
         * Se utiliza en el ApunteController para la funcion cantidadApunte()
         */
        $horario =  $this->db->query("SELECT id_categoria FROM horario WHERE id = {$id_horario}");
        return $horario->fetch(PDO::FETCH_OBJ);
    }

    public function getOneHorario() {
        /**
         * Selecciona un horario 
         * Se utiliza para editar un horario
         * */
        $horario =  $this->db->query("SELECT * FROM horario WHERE id = {$this->id}");
        return $horario;
    }

    public function comprobarAforo($id_horario) {
        /**
         * Comprueba el aforo del horario 
         * */
        $consulta = $this->db->query("SELECT aforo_disponible FROM horario WHERE id = $id_horario");
        $aforo = $consulta->fetch(PDO::FETCH_OBJ);
        if($aforo->aforo_disponible > 0) {
            return true;
        }else {
            return false;
        }
    }

    public static function obtenerHorarioPorCategoria($idCategoria, $id_cliente) {
        /**
         * Obtiene el id y la fecha de un horario filtrando por categoria, aforo que no sea
         * cero y donde el cliente no esté apuntado. 
         */
        $horario = new Horario();
        //$query = "SELECT id, fecha FROM horario WHERE id_categoria = $idCategoria AND SYSDATE() < fecha 
        //AND aforo_disponible > 0";
        $query = "SELECT 
        horario.id AS id_horario, fecha FROM horario WHERE 
        id_categoria = $idCategoria 
        AND aforo_disponible > 0
        AND horario.id NOT IN (SELECT id_horario FROM apuntado WHERE id_cliente = $id_cliente);";

        $horarioFiltrado = $horario->db->query($query);
        
        return $horarioFiltrado;
    }

    public static function cantidadApunte($id_cliente, $id_categoria) {
        /**
         * Selecciona el número de veces que el cliente está apuntado 
         * en esa categoría. Por ejemplo, en studio está apuntado a 2 clases
         * */
        $horario = new Horario();
        $query = "SELECT COUNT(horario.id) AS cantidad_horario
        FROM horario 
        INNER JOIN apuntado ON apuntado.id_horario = horario.id
        WHERE id_cliente = {$id_cliente}
        AND id_categoria = {$id_categoria}";

        $horario = $horario->db->query($query);
        return $horario->fetch(PDO::FETCH_OBJ);
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
         * Validacion del horario. Mejorar
         **/
        if(is_array($datos['aforo_disponible'])){
            $i = count($datos['aforo_disponible']) -1; //654
            foreach($datos as $dato) { 
                for($fila=0;$fila <= $i; $fila++ ) {
    
                    if(isset($datos['aforo_disponible'][$fila]) && !is_numeric($datos['aforo_disponible'][$fila])) {
                        $this->errores[] = "El aforo debe ser un número";
                    }
                    
                    if(isset($datos['id_categoria'][$fila]) && $datos['id_categoria'][$fila] == 'selecciona') {
                        $this->errores[] = "Selecciona una categoría";
                    }
                    if(isset($datos['id_horario'][$fila]) && $datos['id_horario'][$fila] == 'selecciona') {
                        $this->errores[] = "Selecciona un horario";
                    }
                }
               
            }
        }else{
            if(isset($datos['aforo_disponible']) && !is_numeric($datos['aforo_disponible'])) {
                $this->errores[] = "El aforo debe ser un número";
            }
            
            if(isset($datos['id_categoria']) && $datos['id_categoria']== 'selecciona') {
                $this->errores[] = "Selecciona una categoría";
            }
            if(isset($datos['id_horario']) && $datos['id_horario'] == 'selecciona') {
                $this->errores[] = "Selecciona un horario";
            }
        }
        return  $this->errores;
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