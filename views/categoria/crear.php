<?php 
use Utils\Utils;

?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Crear Categoría</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['crear_categoria']) && $_SESSION['crear_categoria']=='complete') {
    echo "<strong>Categoría creada</strong>";
}

elseif(isset($_SESSION['crear_categoria']) && $_SESSION['crear_categoria']=='failed') {
    echo "<strong>Categoría no creada</strong>";
}

elseif(isset($_SESSION['crear_categoria']) && is_array($_SESSION['crear_categoria'])){
    foreach($_SESSION['crear_categoria'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['crear_categoria']);
?>
</div>
<div class="crear"> 

<form id="formularioCrear" action="<?=$_ENV['base_url']?>categoria/crear" method="POST" enctype="multipart/form-data">
<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" required>
    </p>
    
    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen" required>
</p>
    </div>

    <div class="caja">
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="" cols="30" rows="10" required></textarea>
    </p>

    </div>
    
</div>

    <div class="contenedor">
        <input class="insertarDato" type="submit"  name="crear" value="Crear">
        <a class="volver" href="<?= $_ENV['base_url'] ?>categoria/gestion">Volver</a>
</div>

        
</form>

</div>
</div>

</main>