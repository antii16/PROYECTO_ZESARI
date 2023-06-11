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
if(isset($_SESSION['crear_horario']) && $_SESSION['crear_horario']=='complete') {
    echo "<strong>Horario creado</strong>";
}

elseif(isset($_SESSION['crear_horario']) && $_SESSION['crear_horario']=='failed') {
    echo "<strong>Horario no creado</strong>";
}

elseif(isset($_SESSION['crear_horario']) && is_array($_SESSION['crear_horario'])){
    foreach($_SESSION['crear_horario'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['crear_horario']);
?>
</div>
<div class="crear"> 

<form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/crear" method="POST" enctype="multipart/form-data">
<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="aforo_disponible">Aforo disponible: </label>
        <input type="text" name="data[aforo_disponible]" required>
    </p>

    <p> 
        <label for="fecha">Día y hora: </label>
        <input type="datetime-local" name="data[fecha]" required>
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
    </div>
</div>

    <div class="contenedor">
        <input class="insertarDato" type="submit"  name="crear" value="Crear">
        <a class="volver" href="<?= $_ENV['base_url'] ?>horario/gestion">Volver</a>
</div>

        
</form>

</div>
</div>

</main>