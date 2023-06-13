<?php 
use Utils\Utils;
use Models\Categoria;
?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Crear Horario</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['editar_horario']) && $_SESSION['editar_horario']=='complete') {
    echo "<strong>Horario editado</strong>";
}

elseif(isset($_SESSION['editar_horario']) && $_SESSION['editar_horario']=='failed') {
    echo "<strong>Horario no editado</strong>";
}

elseif(isset($_SESSION['editar_horario']) && is_array($_SESSION['editar_horario'])){
    foreach($_SESSION['editar_horario'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['editar_horario']);
?>
</div>
<div class="crear"> 
<?php while($horario = $datos->fetch(PDO::FETCH_OBJ)):?>
<form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/editar/<?=$horario->id?>" method="POST" enctype="multipart/form-data">
<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="aforo_disponible">Aforo disponible: </label>
        <input type="text" name="data[aforo_disponible]" value="<?=$horario->aforo_disponible?>" required>
    </p>

    <p> 
        <label for="fecha">Día y hora: </label>
        <input type="datetime-local" name="data[fecha]" value="<?=$horario->fecha?>" required>
    </p>
    <?php $categorias = Categoria::obtenerCategorias(); ?>
    <p>
        <label for="categoria">Categoria:</label>
        <select name="data[id_categoria]">
        <option value="selecciona">Selecciona una categoría</option>  
            <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
                <option value="<?=$categoria->id?>" <?php if($horario->id_categoria == $categoria->id) echo 'selected'?>><?=$categoria->titulo?></option>  
            <?php endwhile?>

        </select>
    </p>
    </div>
</div>

    <div class="contenedor">
        <input class="editar2" type="submit"  name="crear" value="Editar">
        <a class="volver" href="<?= $_ENV['base_url'] ?>horario/gestion">Volver</a>
</div>

        
</form>
<?php endwhile; ?>
</div>
</div>

</main>