<?php use Models\Clase;?>
<h1>Clases</h1>


<div class="crud">


<h1>Gestión de Clases</h1>

<form action="">
    <label for="buscar">Buscar</label>
    <input type="text" name="">
</form>

<p>
    <a href="<?=$_ENV['base_url']?>clase/crear" class="btn btn-primary">Crear Clase</a>
</p>
<table>
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
            <td style="text-align: center;"><?=$clase->descripcion?></td>
            <td style="text-align: center;"><?=$clase->precio?></td>
            <td style="text-align: center;"><?=$clase->horario?></td>
            <td style="text-align: center;"><?=$clase->aforo?></td>
            <td style="text-align: center;"><?=$clase->imagen?></td>
            <td style="text-align: center;"><?=$clase->id_usuario_profesor?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$clase->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$clase->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
