<?php 
use Utils\Utils;
use Models\Usuario;
use Models\Categoria;

?>

<main>
<div class="main-contenido">

<div class="crear"> 

<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>clase/crear" method="POST" enctype="multipart/form-data">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]">
    </p>
    <p> 
        <label for="precio">Precio: </label>
        <input type="text" name="data[precio]">
    </p>

    <p> 
        <label for="dia">Dia: </label>
        <input type="text" name="data[dia]" value="">
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

    <?php $categorias = Categoria::obtenerCategorias(); ?>
    <p>

        <label for="categoria">Categoria:</label>
        <select name="data[id_categoria]">
        <option value="selecciona">Selecciona una categoría</option>  
            <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
                <option value="<?=$categoria->id?>"><?=$categoria->titulo?></option>  
            <?php endwhile?>

        </select>

    </p>
    
    
<input type="submit"  name="crear" value="Crear" class="btn btn-success">
        
</form>

</div>
</div>
</main>

<?php var_dump($datos);?>