<?php 
use Utils\Utils;
use Models\Blog;

?>

<main>

 <!-- HEADER CONTENIDO -->
 <div class="header-submenu">
        <div class="overlay">
        <h1>Editar Blog</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
<div class="main-contenido">

<div class="alertas">
<?php 
if(isset($_SESSION['editar_blog']) && $_SESSION['editar_blog']=='complete') {
    echo "<strong>Blog editado</strong>";
}

elseif(isset($_SESSION['editar_blog']) && $_SESSION['editar_blog']=='failed') {
    echo "<strong>Blog no editado</strong>";
}
unset($_SESSION['editar_blog']);
?>
</div>
<div class="crear"> 
<?php while($blog = $datos->fetch(PDO::FETCH_OBJ)):?>
<form id="formularioCrear" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>blog/editar/<?=$blog->id?>" method="POST" enctype="multipart/form-data">
<div class="contenedor">

<div class="caja">
<p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" value="<?=$blog->titulo?>" required>
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="descripcion" cols="30" rows="10" required><?php echo $blog->descripcion; ?></textarea>
    </p>

</div>

<div class="caja">

<p> 
        <label for="texto">Texto: </label>
        <textarea  name="data[texto]" id="contenido" cols="30" rows="10" required>
        <?php echo $blog->texto; ?>
        </textarea>
   
        <script type="text/javascript">
            CKEDITOR.replace( 'contenido')
        </script>
        
    </p>

    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen">Imagen  predeterminada: <?php echo $blog->imagen?>
</p>

</div>

</div>    
<div class="contenedor">
    <input class="editar2" type="submit" value="Editar">     
    <a class="volver" href="<?= $_ENV['base_url'] ?>blog/gestion">Volver</a>
</div>
        
</form>

</div>
</div>
</main>

<?php endwhile?>
