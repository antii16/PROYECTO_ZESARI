<?php 
use Utils\Utils;

?>


<div class="crear"> 

<h1>Crear usuario</h1>

<!-- <div class="formularioGeneral">
    Elige el usuario: 
    <select id="seleccionado" name="rol">
        <option value="">Selecciona</option>
        <option value="empleado">Empleado</option>
        <option value="cliente">Cliente</option>
     </select>
     <input type="submit" id="btnCargar" value="cargarFormulario">
</div> -->


<div id="formularioUsuario">
<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>usuario/registro" method="POST" enctype="multipart/form-data">
   <div class="caja">
    <fieldset>
    <legend>Datos obligatorios:</legend>
    <p> 
        <label for="nombre">Nombre: </label>
        <input type="text" name="data[nombre]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->nombre?>">
    </p>
    <p> 
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="data[apellidos]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->apellidos?>">
    </p>

    <p> 
        <label for="email">Email: </label>
        <input type="text" name="data[email]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->email?>">
    </p>

    <p> 
        <label for="password">Contraseña: </label>
        <input type="password" name="data[password]" >
    </p>
    </fieldset>
  

   </div> 
   
<div class="caja">
<p>
        <label for="fecha_nacimiento">Fecha de nacimiento: </label>
        <input type="date" name="data[fecha_nacimiento]">
    </p>

    <p>
    <label for="lugar_nacimiento">Lugar de Nacimiento: </label>
        <input type="text" name="data[lugar_nacimiento]">
    </p>

    <p>
    <label for="direccion">Dirección: </label>
        <input type="text" name="data[direccion]">
    </p>

    <p>
    <label for="telefono">Teléfono: </label>
        <input type="text" name="data[telefono]">
    </p>
    <p>
    <label for="telefono2">Segundo teléfono: </label>
        <input type="text" name="data[telefono2]">
    </p>

    <p>
    <label for="sexo">Sexo: </label>
        <input type="radio" name="data[sexo]">
        <label for="femenino">Femenino</label>

        <input type="radio" name="data[sexo]">
        <label for="masculino">Masculino</label>
    </p>

</div>
   

   
    <p> 
        <label for="patologias">Patologías: </label>
        <textarea name="data[patologias]" id="" cols="30" rows="10"></textarea>
    </p>

    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen">
</p>
    
        <p> 
       <select name="data[rol]" id="">
        <option value="empleado">Empleado</option>
        <option value="cliente">Cliente</option>
        <option value="admin">Administrador</option>
       </select>
    </p>

    
    <?php //if(isset($_SESSION['identity'])):?>
        <input type="submit"  name="editar" value="Edita los datos" class="btn btn-success">
        
    <?php //else:?>   
        <input type="submit" name="registrar"  value="Dar de alta" class="btn btn-primary">
    <?php //endif;?>  

   

</form>


</div>