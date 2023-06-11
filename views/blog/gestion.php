<?php use Models\Blog;?>


<main>
     <!-- HEADER CONTENIDO -->
 <div class="header-submenu">
        <div class="overlay">
        <h1>Gestión de Blogs</h1>
        </div>
    </div>

    <!-- MAIN CONTENIDO -->
<div class="main-contenido">
<div class="crud">
<div class="añadir">
        <a class="add" href="<?=$_ENV['base_url'] ?>blog/crear">Añadir +</a>
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
            <th>Opciones</th>
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
                <a class="borrar" href="<?=$_ENV['base_url']?>blog/borrar/<?=$blog->id?>">Borrar</a>
                <a class="editar" href="<?=$_ENV['base_url']?>blog/editar/<?=$blog->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>

</div>
    </main>