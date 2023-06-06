<?php use Models\Categoria;?>


<main>
<div class="main-contenido">
<h1>Gestión de Categorias</h1>
<div class="crud">

<div class="añadir">
        <a  href="<?= $_ENV['base_url'] ?>usuario/registro">Añadir <i class="fa-solid fa-pen"></i></a>
    </div>

<table id="tabla" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Opción</th>
        </tr>
    </thead>
    <tbody>
   <?php $categorias = Categoria::obtenerCategorias(); ?>
    <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$categoria->id?></td>
            <td style="text-align: center;"><?=$categoria->titulo?></td>
            <td style="text-align: center;"><?=$categoria->descripcion?></td>
            <td style="text-align: center;"><?=$categoria->imagen?></td>
            <td style="text-align: center;">
                <a class="btn btn-primary" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$categoria->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$categoria->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>

</div>
</main>