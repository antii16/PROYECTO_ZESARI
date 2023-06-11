<?php use Models\Categoria;?>


<main>
      <!-- HEADER CONTENIDO -->
 <div class="header-submenu">
        <div class="overlay">
        <h1>Gestión de Categorias</h1>
        </div>
    </div>

     <!-- MAIN CONTENIDO -->
<div class="main-contenido">

<div class="crud">

<div class="añadir">
        <a  class="add" href="<?= $_ENV['base_url'] ?>categoria/crear">Añadir +</a>
    </div>

<table id="tabla" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
   <?php $categorias = Categoria::obtenerCategorias(); ?>
    <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$categoria->id?></td>
            <td style="text-align: center;"><?=$categoria->titulo?></td>
            <td style="text-align: center;"><?=$categoria->imagen?></td>
            <td style="text-align: center;">
                <a class="borrar" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$categoria->id?>">Borrar</a>
                <a class="editar" href="<?=$_ENV['base_url']?>categoria/editar/<?=$categoria->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>

</div>
</main>