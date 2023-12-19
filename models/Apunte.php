<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;


class Apunte{
    private int $id;
    private string $id_cliente;
    private string $id_horario;
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

    public function get_idCliente(): string{
        return $this->id_cliente;
    }

    public function set_idCliente(string $id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function get_idHorario(): int{
        return $this->id_horario;
    }

    public function set_idHorario(int $id_horario){
        $this->id_horario = $id_horario;
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

        $horario =  $horario->db->query($query);
        return $horario->fetch(PDO::FETCH_OBJ);
    }

    public function validarApunte($datos){
        /**
         * Valida si los valores son correctos
         */
        if(is_array($datos['id_cliente'])){
            //Si es viene más de un valor
            $i = count($datos); 
                for($fila=0;$fila <= $i; $fila++ ) {
                    if(isset($datos['id_horario'][$fila]) && $datos['id_horario'][$fila] == 'selecciona') {
                        $this->errores[] = "Selecciona un horario";
                    }
                }
        }else{
            //Si es viene un valor
            if(isset($datos['id_horario']) && $datos['id_horario'] == 'selecciona') {
                $this->errores[] = "Selecciona un horario";
            }
        }
        return  $this->errores;
    }

    
    public function restarAforo($id_horario) {
        /**Actualiza el aforo cuando  un cliente se apunta */
        $consulta = $this->db->query("SELECT aforo_disponible FROM horario WHERE id = $id_horario");
        $aforo = $consulta->fetch(PDO::FETCH_OBJ);
        $aforoRestado = intval($aforo->aforo_disponible) - 1;
        $consulta = $this->db->query("UPDATE horario SET aforo_disponible = $aforoRestado WHERE id = $id_horario");

    }
    public function sumarAforo($id){
        /**Suma el aforo cuando se desapunta un usuario de un horario */
        $consulta = $this->db->query("SELECT id_horario, aforo_disponible
        FROM apuntado 
        INNER JOIN horario ON apuntado.id_horario = horario.id
        WHERE apuntado.id = $id");

        $horario = $consulta->fetch(PDO::FETCH_OBJ);
        $aforoSumado = intval($horario->aforo_disponible) + 1;
        $consulta = $this->db->query("UPDATE horario SET aforo_disponible = $aforoSumado WHERE id = $horario->id_horario");
    }

    public function apuntar() {
        /**
         * Apunta al usuario en un horario y actualiza el aforo, 
         * restándolo  
         * */
        $ins = $this->db->prepare("INSERT INTO apuntado(id_cliente, id_horario) 
        VALUES (:id_cliente, :id_horario)");

        $ins->bindParam( ':id_cliente', $id_cliente, PDO::PARAM_STR);
        $ins->bindParam( ':id_horario', $id_horario, PDO::PARAM_STR);
        
        $id_cliente = $this->get_idCliente();
        $id_horario = $this->get_idHorario();

        $this->restarAforo($this->get_idHorario());
        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
            
        }

       return $result;
    }

    public function borrar() {
        /**
         * Borra al usuario apuntado
         * y se suma el aforo
         */
        $sql = "DELETE FROM apuntado WHERE id = :id";
        $resul =  $this->db->prepare($sql);
        $resul->bindParam(':id', $id, PDO::PARAM_STR);
        $id = $this->getId();
        
        $this->sumarAforo($id);
        try{
            $resul->execute();
            $result = true;
        }catch(PDOException $err){
            $result= false;
        }

       return $result;
    }
}