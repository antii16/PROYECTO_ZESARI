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
        <div class="crear"> 



<form id="formularioCrear" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>blog/crear" method="POST" enctype="multipart/form-data">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" required>
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="descripcion" cols="30" rows="10" required></textarea>
    </p>

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

   
<input type="submit"  name="crear" value="Crear" class="btn btn-success">
        
</form>

</div>
</div>
</main>