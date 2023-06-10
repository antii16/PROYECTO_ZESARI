<?php use Models\Pago;?>
<h1>Pagp</h1>


<div class="crud">


<h1>Gestión de Pagos</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Clase</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
   <?php $pagos = Pago::obtenerPagos(); ?>
    <?php while($pago = $pagos->fetch(PDO::FETCH_OBJ)):?>
        <tr>
            <td style="text-align: center;"><?=$pago->id?></td>
            <td style="text-align: center;"><?=$pago->id_cliente?></td>
            <td style="text-align: center;"><?=$pago->fecha?></td>
            <td style="text-align: center;"><?=$pago->tipo?></td>
            <td style="text-align: center;"><?=$pago->id_clase?></td>
            <td style="text-align: center;"><?=$pago->estado?></td>
            <td style="text-align: center;">
                <a class="btn btn-success" href="<?=$_ENV['base_url']?>usuario/editar/<?=$usuario->id?>">Editar</a>

            </td>
        </tr>
     <?php endwhile?>
    </tbody>
</table>

</div>
