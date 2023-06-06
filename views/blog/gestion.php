<?php use Models\Blog;?>


<main>
<div class="main-contenido">
<h1>Gestión de Blogs</h1>
<div class="crud">




<div class="añadir">
        <a  href="<?= $_ENV['base_url'] ?>usuario/registro">Añadir <i class="fa-brands fa-blogger"></i></i></a>
    </div>
<table id="tabla" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <!-- <th>Texto</th> -->
            <!-- <th>Fecha</th> -->
            <th>Imagen</th>
            <th>Empleado</th>
        </tr>
    </thead>
    <tbody>
   <?php $blogs = Blog::obtenerBlogs(); ?>
    <?php while($blog = $blogs->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$blog->id?></td>
            <td style="text-align: center;"><?=$blog->titulo?></td>
            <td style="text-align: center;"><?=$blog->descripcion?></td>
            <td style="text-align: center;"><?=$blog->imagen?></td>
            <td style="text-align: center;"><?=$blog->id_usuario_empleado?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$blog->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$blog->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>

</div>
    </main>