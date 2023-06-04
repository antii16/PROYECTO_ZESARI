<?php use Models\Categoria;?>
<h1>Categorias</h1>


<div class="crud">


<h1>Gestión de Categorias</h1>

<p>
    <a href="<?=$_ENV['base_url']?>categoria/crear">Crear Categoria</a>
</p>

<table id="myTable">
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
