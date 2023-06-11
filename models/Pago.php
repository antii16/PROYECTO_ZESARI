<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;

class Pago{
    private string $id;
    private string $fecha;
    private string $tipo;
    private string $estado;
    private string $cantidad;
    private string $id_cliente;
    private string $id_empleado_anota;
    private string $id_clase;
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

    public function getTipo(): string{
        return $this->tipo;
    }

    public function setTipo(string $tipo){
        $this->tipo = $tipo;
    }

    public function getEstado(): string{
        return $this->estado;
    }

    public function setEstado(string $estado){
        $this->estado = $estado;
    }

    public function getCantidad(): string{
        return $this->cantidad;
    }

    public function setCantidad(string $cantidad){
        $this->cantidad = $cantidad;
    }

    public function get_idCliente(): int{
        return $this->id_cliente;
    }

    public function set_idCliente(int $id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function get_idEmpleadoAnota(): int{
        return $this->id_empleado_anota;
    }

    public function set_idEmpleadoAnota(int $id_empleado_anota){
        $this->id_empleado_anota = $id_empleado_anota;
    }

    public function get_idClase(): int{
        return $this->id_clase;
    }

    public function set_idClase(int $id_clase){
        $this->id_clase = $id_clase;
    }

    public static function obtenerPagos() {
        /**
         * Selecciona todos los peliculas
         */
        $pago = new Pago();
        $pagos = $pago->db->query("SELECT * FROM pagos ORDER BY id DESC;");

// INNER JOIN usuarios ON pagos.id_cliente = usuarios.id 
// INNER JOIN clases ON pagos.id_clase = clases.id 
// WHERE rol = 'cliente'
        return $pagos;
    }

    public function getAllPagos() {
        $pagos = $this->db->query("SELECT usuarios.nombre AS usuario_nombre, 
        clases.titulo AS clases_titulo, 
        pagos.id_cliente AS id_cliente, 
        clases.id_categoria AS id_categoria
        FROM pagos 
        INNER JOIN clases ON pagos.id_clase = clases.id
        INNER JOIN usuarios ON pagos.id_cliente = usuarios.id
        WHERE id_cliente = {$this->id_cliente}");

        return $pagos;
    }

    // public function obtenerClasesPagadasUsuario() {
    //     $consulta = "SELECT clases.titulo as titulo 
    //     FROM clases 
    //     INNER JOIN
        
        
    //     WHERE id = {$this->id}";
    //     $clasesUsuario =  $this->db->query();
    //     return $categoria;
    // }

    public function save() {
        /**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

        $ins = $this->db->prepare("INSERT INTO pagos(fecha, tipo, estado, cantidad,id_cliente, id_empleado_anota, id_clase) 
        VALUES (now(), :tipo, :estado, :cantidad, :id_cliente, :id_empleado_anota, :id_clase)");

        $ins->bindParam( ':tipo', $tipo, PDO::PARAM_STR);
        $ins->bindParam( ':estado', $estado, PDO::PARAM_STR);
        $ins->bindParam( ':cantidad', $cantidad, PDO::PARAM_STR);
        $ins->bindParam( ':id_cliente', $id_cliente, PDO::PARAM_STR);
        $ins->bindParam( ':id_empleado_anota', $id_empleado_anota, PDO::PARAM_STR);
        $ins->bindParam( ':id_clase', $id_clase, PDO::PARAM_STR);
        
        $tipo = $this->getTipo();
        $estado = $this->getEstado();
        $cantidad = $this->getCantidad();
        $id_cliente = $this->get_idCliente();
        $id_empleado_anota = $_SESSION['identity']->id;
        $id_clase = $this->get_idClase();
        
        try{
            $ins->execute();
            $result = true;
        }catch(PDOException $err){
            $result= $err;
            var_dump($result);
            die();
            
        }

       return $result;
    }

    public function validar($datos) {
        /**
         * Validacion de la pelicula.
         * Valida el si los campos no están vacíos y que el stock y el precio son números
         * y no letras
         **/
        if(!is_numeric($datos['cantidad'])) {
            $this->errores[] = "El precio debe ser un número";
        }

        if($datos['tipo'] == 'seleccionada') {
            $this->errores[] = "Seleccione el tipo de pago";
        }
        if($datos['estado'] == 'seleccionada') {
            $this->errores[] = "Seleccione el estado del pago";
        }

        if($datos['id_clase'] == 'seleccionada') {
            $this->errores[] = "Seleccione una clase";
        }


        return  $this->errores;
    }
}