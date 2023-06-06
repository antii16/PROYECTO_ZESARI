<?php use Models\Clase;?>



<main>
<div class="main-contenido">
<h1>Gestión de Clases</h1>
<div class="crud">




<div class="añadir">
        <a  href="<?= $_ENV['base_url'] ?>usuario/registro">Añadir<i class="fa-solid fa-person-chalkboard"></i></a>
    </div>
<table id="tabla" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Horario</th>
            <th>Aforo</th>
            <th>Imagen</th>
            <th>Profesor</th>
        </tr>
    </thead>
    <tbody>
   <?php $clases = Clase::obtenerClases(); ?>
    <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$clase->id?></td>
            <td style="text-align: center;"><?=$clase->titulo?></td>
            <td style="text-align: center;"><?=$clase->precio?></td>
            <td style="text-align: center;"><?=$clase->horario?></td>
            <td style="text-align: center;"><?=$clase->aforo?></td>
            <td style="text-align: center;"><?=$clase->id_usuario_profesor?></td>
            <td style="text-align: center;"><?=$clase->id_categoria?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$clase->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$clase->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
</div>
</main>