<?php use Models\Clase;?>



<main>

 <!-- HEADER CONTENIDO -->
 <div class="header-submenu">
        <div class="overlay">
        <h1>Gestión de Clases</h1>
        </div>
    </div>

    <!-- MAIN CONTENIDO -->
<div class="main-contenido">

<div class="crud">
<div class="añadir">
        <a class="add" href="<?= $_ENV['base_url'] ?>clase/crear">Añadir +</a>
    </div>
<table id="tabla" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Cantidad de clases</th>
            <th>Profesor</th>
            <th>Categoria</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
   <?php $clases = Clase::obtenerClases(); ?>
    <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$clase->id?></td>
            <td style="text-align: center;"><?=$clase->titulo?></td>
            <td style="text-align: center;"><?=$clase->precio?></td>
            <td style="text-align: center;"><?=$clase->cantidad?></td>
            <td style="text-align: center;"><?=$clase->id_usuario_profesor?></td>
            <td style="text-align: center;"><?=$clase->id_categoria?></td>
            <td style="text-align: center;">
                <a class="borrar" href="<?=$_ENV['base_url']?>clase/borrar/<?=$clase->id?>">Borrar</a>
                <a class="editar" href="<?=$_ENV['base_url']?>clase/editar/<?=$clase->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
</div>
</main>