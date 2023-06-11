<?php 
use Utils\Utils;

?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Editar Categoría</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria']=='complete') {
    echo "<strong>Categoría editada</strong>";
}

elseif(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria']=='failed') {
    echo "<strong>Categoría no editada</strong>";
}


elseif(isset($_SESSION['editar_categoria']) && is_array($_SESSION['editar_categoria'])){
    foreach($_SESSION['editar_categoria'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
 
}
unset($_SESSION['editar_categoria']);
?>
</div>
<div class="crear"> 
 
<?php while($categoria = $datos->fetch(PDO::FETCH_OBJ)):?>
<form id="formularioCrear" action="<?=$_ENV['base_url']?>categoria/editar/<?=$categoria->id?>" method="POST" enctype="multipart/form-data">

<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" value="<?=$categoria->titulo?>" required>
    </p>
    
    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen"> Imagen  predeterminada: <?php echo $categoria->imagen?>
</p>
    </div>

    <div class="caja">
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="" cols="30" rows="10" required>
        <?php echo $categoria->descripcion; ?>
        </textarea>
    </p>

    </div>
    
</div>

    <div class="contenedor">
        <input class="editar2" type="submit"  name="editar" value="Editar">
        <a class="volver" href="<?= $_ENV['base_url'] ?>categoria/gestion">Volver</a> 
    </div>

        
</form>

<?php endwhile?>

</div>
</div>

</main>