<?php use Models\Pago;?>
<h1>Pagp</h1>


<div class="crud">


<h1>Gestión de Pagos</h1>

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
   <?php $pagos = Pago::obtenerPagos(); ?>
    <?php while($pago = $pagos->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$usuario->id?></td>
            <td style="text-align: center;"><?=$usuario->nombre?></td>
            <td style="text-align: center;"><?=$usuario->apellidos?></td>
            <td style="text-align: center;"><?=$usuario->email?></td>
            <td style="text-align: center;"><?=$usuario->rol?></td>
            <td style="text-align: center;">
                <a class="btn btn-danger" href="<?=$_ENV['base_url']?>usuario/borrar/<?=$usuario->id?>">Borrar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>usuario/editar/<?=$usuario->id?>">Editar</a>
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>pagar/<?=$usuario->id?>">Pagar</a>
            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
