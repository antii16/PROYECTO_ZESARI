<?php 
use Utils\Utils;
use Models\Blog;

?>

<main>

 <!-- HEADER CONTENIDO -->
 <div class="header-submenu">
        <div class="overlay">
        <h1>Crear Blog</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['crear_blog']) && $_SESSION['crear_blog']=='complete') {
    echo "<strong>Blog creado</strong>";
}

elseif(isset($_SESSION['crear_blog']) && $_SESSION['crear_blog']=='failed') {
    echo "<strong>Blog no creado</strong>";
}
unset($_SESSION['crear_blog']);
?>
</div>
<div class="crear"> 
<form id="formularioCrear" action="<?=$_ENV['base_url']?>blog/crear" method="POST" enctype="multipart/form-data">
<div class="contenedor">

<div class="caja">
<p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]"  required>
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="descripcion" cols="30" rows="10" required></textarea>
    </p>

</div>

<div class="caja">

<p> 
        <label for="texto">Texto: </label>
        <textarea  name="data[texto]" id="contenido" cols="30" rows="10" required></textarea>
   
        <script type="text/javascript">
            CKEDITOR.replace( 'contenido')
        </script>
        
    </p>

    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen" required>
</p>

</div>

</div>    
<div class="contenedor">
    <input class="insertarDato" type="submit" value="Crear">     
    <a class="volver" href="<?= $_ENV['base_url'] ?>blog/gestion">Volver</a>
</div>
        
</form>

</div>
</div>
</main>

