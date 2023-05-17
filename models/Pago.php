<?php

namespace Models;
use Lib\BaseDatos;
use PDO;
use PDOException;

class Clase{
    private string $id;
    private string $fecha;
    private string $tipo;
    private string $estado;
    private string $cantidad;
    private string $id_cliente;
    private string $id_empleado_anota;
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

   
}