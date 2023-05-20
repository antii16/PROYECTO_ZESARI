<?php 
use Utils\Utils;
use Models\Blog;

?>

<div class="crear"> 

<h1>Crear Blog</h1>

<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>blog/crear" method="POST" enctype="multipart/form-data">
    <p> 
        <label for="titulo">Titulo: </label>
        <input type="text" name="data[titulo]" value="<?php if(isset($_SESSION['identity'])) echo $_SESSION['identity']->nombre?>">
    </p>
    <p> 
        <label for="descripcion">Descripción: </label>
        <textarea name="data[descripcion]" id="" cols="30" rows="10"></textarea>
    </p>

    <p> 
        <label for="texto">Texto: </label>
        <textarea name="data[texto]" id="" cols="30" rows="10"></textarea>
    </p>

    <p> 
        <label for="fecha">Fecha: </label>
        <input type="date" name="data[fecha]">
    </p>

    <p>
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen">
</p>

    
    
<input type="submit"  name="crear" value="Crear" class="btn btn-success">
        
</form>

</div>
