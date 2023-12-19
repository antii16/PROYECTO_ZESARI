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
    private string $cantidad;
    private int $id_usuario_profesor;
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

    public function getCantidad(): int{
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad){
        $this->cantidad = $cantidad;
    }

    public function get_idProfesor(): int{
        return $this->id_usuario_profesor;
    }

    public function set_idProfesor(int $id_usuario_profesor){
        $this->id_usuario_profesor = $id_usuario_profesor;
    }

    public function get_idCategoria(): int{
        return $this->id_categoria;
    }

    public function set_idCategoria(int $id_categoria){
        $this->id_categoria = $id_categoria;
    }

    // public function obtenerClasesHorario() {
    //     $sql = "SELECT * FROM clases";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute();
    //     // Array para almacenar los datos de las clases
    //     $clases = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $clases;
    // }

    public static function obtenerClases() {
        /**
         * Selecciona todos los clases.
         * Se utiliza en clases/gestion
         */
        $clase = new Clase();
        $clases = $clase->db->query(
            "SELECT cl.id, cl.titulo as titulo_clase, cantidad,
            precio, ca.titulo as titulo_categoria
            FROM clases AS cl INNER JOIN categorias AS ca
            ON cl.id_categoria = ca.id ORDER BY cl.id DESC;");
        return $clases;
    }

    public function getOneClase() {
        /**
         * Devuelve los datos de una única clase según el id
         * Se utiliza en ClaseController->editar
         */
        $clase =  $this->db->query("SELECT * FROM clases WHERE id = {$this->id}");
        return $clase;
    }

    public function getOneClaseDatos() {
        /**
         * Devuelve los datos de una única clase según el id 
         * Se utliza en ClaseController->obtenerDatosClase
         */
        $clase = $this->db->query("SELECT * FROM clases WHERE id={$this->id};");
        return $clase->fetch(PDO::FETCH_OBJ);
    }
    public function save() {
        /**
         * Guarda los datos de la clase
         * Devuelve true si se ha creado y false si no
         */

        $ins = $this->db->prepare("INSERT INTO clases(titulo, precio, cantidad, id_usuario_profesor, id_categoria) 
        VALUES (:titulo, :precio, :cantidad, :id_usuario_profesor, :id_categoria)");

        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
        $ins->bindParam( ':cantidad', $cantidad, PDO::PARAM_STR);
        $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);
        
        $titulo = $this->getTitulo();
        $precio = $this->getPrecio();
        $cantidad = $this->getCantidad();
        $id_usuario_profesor = $this->get_idProfesor();
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
         * Validacion de la clase
         **/

        if(is_numeric($datos['titulo'])) {
            $this->errores[] = "El titulo debe ser texto";
        }
        if(!is_numeric($datos['precio'])) {
            $this->errores[] = "El precio debe ser un valor numérico";
        }
        if(!is_numeric($datos['cantidad'])) {
            $this->errores[] = "La cantidad debe ser un valor numérico";
        }

        if($datos['id_usuario_profesor'] == 'selecciona') {
            $this->errores[] = "Selecciona un profesor";
        }
        if($datos['id_categoria'] == 'selecciona') {
            $this->errores[] = "Selecciona una categoría";
        }
        return  $this->errores;
    }

    public function edit(){
        /**
         * Se edita una clase pasando el id de la clase
         */
        $ins = $this->db->prepare("UPDATE clases
        SET titulo = :titulo, 
        precio = :precio, 
        cantidad = :cantidad,
        id_usuario_profesor = :id_usuario_profesor,
        id_categoria = :id_categoria
        WHERE id = :id");

        $ins->bindParam( ':id', $id, PDO::PARAM_STR);
        $ins->bindParam( ':titulo', $titulo, PDO::PARAM_STR);
        $ins->bindParam( ':precio', $precio, PDO::PARAM_STR);
        $ins->bindParam( ':cantidad', $cantidad, PDO::PARAM_STR);
        $ins->bindParam( ':id_usuario_profesor', $id_usuario_profesor, PDO::PARAM_STR);
        $ins->bindParam( ':id_categoria', $id_categoria, PDO::PARAM_STR);

        $id = $this->getId();
        $titulo= $this->getTitulo();
        $precio= $this->getPrecio();
        $cantidad= $this->getCantidad();
        $id_usuario_profesor= $this->get_idProfesor();
        $id_categoria= $this->get_idCategoria();

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
         * Borra una clase según el id 
         * que se le pasa 
         * Si se ha borrado devuelve true y si no devuelve false
         */
        $sql = "DELETE FROM clases WHERE id = :id";
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