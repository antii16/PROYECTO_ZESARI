<?php use Models\Blog;?>
<h1>blogs</h1>


<div class="crud">


<h1>Gestión de Blogs</h1>

<form action="">
    <label for="buscar">Buscar</label>
    <input type="text" name="">
</form>

<p>
    <a href="<?=$_ENV['base_url']?>blog/crear" class="btn btn-primary">Crear Blog</a>
</p>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <!-- <th>Texto</th> -->
            <th>Fecha</th>
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
            <td style="text-align: center;"><?=$blog->id_usuario_profesor?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$blog->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$blog->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
