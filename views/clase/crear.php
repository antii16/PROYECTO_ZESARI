<?php 
use Utils\Utils;
use Models\Usuario;

?>

<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>clase/crear" method="POST" enctype="multipart/form-data">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->nombre?>">
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="" cols="30" rows="10"></textarea>
    </p>

    <p> 
        <label for="precio">Precio: </label>
        <input type="text" name="data[precio]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->email?>">
    </p>

    <p> 
        <label for="horario">Horario: </label>
        <input type="datetime-local" name="data[horario]">
    </p>

    <p>
        <label for="aforo">Aforo</label>
        <input type="number" name="data[aforo]">
    </p>

    <p>
        <label for="cantidad">Clases al mes: </label>
        <input type="number" name="data[cantidad_mes]">
    </p>
    <?php $profesores = Usuario::obtenerProfesor(); ?>
    <p>

        <label for="profesor">Profesor:</label>
        <select name="data[id_usuario_profesor]">
        <option value="selecciona">Selecciona un profesor</option>  
            <?php while($profe = $profesores->fetch(PDO::FETCH_OBJ)):?>
                <option value="<?=$profe->id?>"><?=$profe->nombre?> <?=$profe->apellidos?></option>  
            <?php endwhile?>

        </select>

    </p>

    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen">
</p>

    
    
<input type="submit"  name="crear" value="Crear" class="btn btn-success">
        
</form>
