<?php 
use Utils\Utils;

?>

<main>
<div class="main-contenido">
<h1>Crear usuario</h1>
<div class="crear"> 


<div id="formularioUsuario">
<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>usuario/registro" method="POST" enctype="multipart/form-data">
   <div class="caja">
    <fieldset>
    <legend>Datos obligatorios:</legend>
    <p> 
        <label for="nombre">Nombre: </label>
        <input type="text" name="data[nombre]" >
    </p>
    <p> 
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="data[apellidos]">
    </p>

    <p> 
        <label for="email">Email: </label>
        <input type="text" name="data[email]">
    </p>

    </fieldset>
  

   </div> 

        <p> 
       <select name="data[rol]" id="">
        <option value="empleado">Empleado</option>
        <option value="cliente"  selected="true">Cliente</option>
        <option value="admin">Administrador</option>
       </select>
    </p>
        <input type="submit" name="registrar"  value="Dar de alta" class="btn btn-primary">
</form>


</div>
</div>
</main>