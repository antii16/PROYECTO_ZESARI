<?php 
use Utils\Utils;

?>

<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>usuario/registro" method="POST" enctype="multipart/form-data">
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
        <input type="password" name="data[password]">
    </p>

    <p> 
       <select name="data[rol]" id="">
        <option value="empleado">Empleado</option>
        <option value="cliente">Cliente</option>
        <option value="admin">Administrador</option>
       </select>
    </p>

    
    <?php if(isset($_SESSION['identity'])):?>
        <input type="submit"  name="editar" value="Edita los datos" class="btn btn-success">
        
    <?php else:?>   
        <input type="submit" name="registrar"  value="Registrarse" class="btn btn-primary">
    <?php endif;?>  

   

</form>