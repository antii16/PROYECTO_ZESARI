<?php 
use Utils\Utils;
use Models\Blog;

?>

<main>
<div class="main-contenido">
<div class="crear"> 

<h1>Editar Blog</h1>

<?php while($blog = $datos->fetch(PDO::FETCH_OBJ)):?>
<form id="formularioInsertarDatos" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>blog/editar/<?=$blog->id?>" method="POST" enctype="multipart/form-data">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" value="<?=$blog->titulo?>" required>
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="descripcion" cols="30" rows="10" required><?php echo $blog->descripcion; ?></textarea>
    </p>

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

    
    
<input type="submit"  name="editar" value="Editar" class="btn btn-success">
        
</form>

</div>
</div>
</main>

<?php endwhile?>
