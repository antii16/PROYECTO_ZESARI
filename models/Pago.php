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
    private string $precio;
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

    public function getPrecio(): string{
        return $this->cantidad;
    }

    public function setPrecio(string $cantidad){
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
        $pagos = $pago->db->query("SELECT * FROM pagos 
        INNER JOIN usuarios ON pagos.id_cliente = usuarios.id 
        INNER JOIN clases ON usuarios.id = clases.id 
        WHERE rol = 'cliente'
        ORDER BY id DESC;");
        return $pagos;
    }

    public function save() {
        /**
         * Guarda los datos de la pelicula
         * que se quiere crear pasandole los datos de la pelicula
         * y la imagen
         * Devuelve true si se ha creado y false si no
         */

        $ins = $this->db->prepare("INSERT INTO pagos(now(), tipo, estado, precio, , id_cliente, id_empleado_anota, id_clase) 
        VALUES (now(), :tipo, :estado, :precio, , :id_cliente, :id_empleado_anota, :id_clase)");

        $ins->bindParam( ':tipo', $tipo, PDO::PARAM_STR);
        $ins->bindParam( ':estado', $estado, PDO::PARAM_STR);
        $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
        $ins->bindParam( ':id_cliente', $id_cliente, PDO::PARAM_STR);
        $ins->bindParam( ':id_empleado_anota', $id_empleado_anota, PDO::PARAM_STR);
        $ins->bindParam( ':id_clase', $id_clase, PDO::PARAM_STR);
        
        $tipo = $this->getTipo();
        $estado = $this->getEstado();
        $precio = $this->getPrecio();
        $id_cliente = $this->get_idCliente();
        $id_empleado_anota = $_SESSION['identity']->id;
        $id_clase = $this->get_idClase();
        
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

        // if(!is_numeric($datos['aforo'])) {
        //     $this->errores[] = "El aforo debe ser un número";
        // }


        return  $this->errores;
    }
}