<?php 
use Utils\Utils;
?>


<main>

<!-- HEADER CONTENIDO -->
</q><div class="header-submenu">
        <div class="overlay">
        <h1>Edita tu perfil</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
<div class="main-contenido">
<div class="crear"> 
<div id="formularioUsuario">
<form  id="formularioCrear" action="<?=$_ENV['base_url']?>usuario/editar" method="POST" enctype="multipart/form-data">
<div class="contenedor">
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
        <p>
            <a  class="cambiarPassword" id="cambiarContraseña" href="#">Cambiar Contraseña</a>
        </p>
    
    <div id="nuevaPassword">
        <div>
        <label for="password">Contraseña: </label>
        <input type="password" name="data[password][passwordOld]">
        </div>
       <div>
       <label for="password">Nueva contraseña: </label>
        <input type="password" name="data[password][passwordNew]">
       </div>
        
    </div>
</p>

   
    </fieldset>

    </div>

    <div class="caja">
        <div id="imagenUsuarioForm">
        <?php if($_SESSION['identity']->imagen != NULL):?>
            <img src="<?= $_ENV['base_url'] ?>src/img/<?=$_SESSION['identity']->imagen?>" alt="">
            <?php else: ?> 
                <img src="<?= $_ENV['base_url'] ?>src/img/user.png" alt="">
            <?php endif; ?>
        </div>
        <p>
        <label for="imagen"> </label>
    <input type="file" name="imagen">Imagen  predeterminada:<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->imagen?>
    </p>
    <?php if(isset($_SESSION['identity']) && ($_SESSION['identity']->rol == 'admin' || $_SESSION['identity']->rol == 'empleado')): ?>
    <p> 
        <label for="profesion">Profesion: </label>
        <input type="text" name="data[profesion]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->profesion?>">
    </p>

    <p> 
        <label for="experiencia">Experiencia: </label>
        <input type="text" name="data[experiencia]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->experiencia?>">
    </p>

    <?php endif; ?>

    </div>
</div>   

<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="fecha_nacimiento">Fecha nacimiento: </label>
        <input type="date" name="data[fecha_nacimiento]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->fecha_nacimiento?>">
    </p>

    <p> 
        <label for="lugar_nacimiento">Lugar nacimiento: </label>
        <input type="text" name="data[lugar_nacimiento]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->lugar_nacimiento?>">
    </p>
    <p> 
        <label for="direccion">Dirección: </label>
        <input type="text" name="data[direccion]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->direccion?>">
    </p>
    <p> 
        <label for="telefono">Teléfono: </label>
        <input type="text" name="data[telefono]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->telefono?>">
    </p>
    <p> 
        <label for="telefono2">Otro teléfono: </label>
        <input type="text" name="data[telefono2]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->telefono2?>">
    </p>
    </div>

    <div class="caja">
    <p> 
        <label for="sexo">Sexo: </label>
    
        <?php if(isset($_SESSION['identity']) && $_SESSION['identity']->sexo == 'femenino'):?>
            <label for="femenino">Femenino </label>
            <input type="radio" name="data[sexo]" value="femenino"  checked> 
            <label for="masculino">Masculino </label>
            <input type="radio" name="data[sexo]" value="masculino"> 

        <?php else:?>
            <label for="femenino">Femenino </label>
            <input type="radio" name="data[sexo]" value="femenino"> 
            <label for="masculino">Masculino </label>
            <input type="radio" name="data[sexo]" value="masculino" checked> 
        <?php endif;?>
    </p>

    <p>

    <label for="patologias">Patologías a tener en cuenta</label>
<textarea name="data[patologias]" id="" cols="30" rows="10">
    <?php echo $_SESSION['identity']->patologias?>
</textarea>   
</p>


    </div>
</div> 

<div class="contenedor">
<input type="submit"  name="editar" value="Editar" class="insertarDato">
<a class="volver" href="<?=$_ENV['base_url']?>perfil">Volver</a>
</div>
    
    
</form>


</div>
        </div>
        </main>


<?php

//var_dump($_SESSION['identity']);