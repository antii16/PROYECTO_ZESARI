<?php use Models\Usuario;?>
<h1>Usuario</h1>


<div class="crud">


<h1>Gestión de Usuarios</h1>

<form action="">
    <label for="buscar">Buscar</label>
    <input type="text" name="">
</form>

<p>
    <a href="<?=$_ENV['base_url']?>usuario/registro" class="btn btn-primary">Crear Usuario</a>
</p>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
   <?php $usuarios = Usuario::obtenerUsuarios(); ?>
    <?php while($usuario = $usuarios->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$usuario->id?></td>
            <td style="text-align: center;"><?=$usuario->nombre?></td>
            <td style="text-align: center;"><?=$usuario->apellidos?></td>
            <td style="text-align: center;"><?=$usuario->email?></td>
            <td style="text-align: center;"><?=$usuario->rol?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>categoria/borrar/<?=$usuario->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>categoria/editar/<?=$usuario->id?>">Editar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
