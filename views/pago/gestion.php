<?php use Models\Pago;?>
<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Gestión de Pagos</h1>
        </div>
    </div>

     <!-- MAIN CONTENIDO -->
     <div class="main-contenido">
        <div class="crud">
            <table id="tabla" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Cantidad pagada</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Clase</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
            <?php $pagos = Pago::obtenerPagos(); ?>
                <?php while($pago = $pagos->fetch(PDO::FETCH_OBJ)):?>
                    <tr>
                        <td style="text-align: center;"><?=$pago->id_pagos?></td>
                        <td style="text-align: center;"><?=$pago->usuario_nombre?> <?=$pago->usuario_apellidos?></td>
                        <td style="text-align: center;"><?=$pago->pago_cantidad?> €</td>
                        <td style="text-align: center;"><?=$pago->fecha?></td>
                        <td style="text-align: center;"><?=$pago->tipo?></td>
                        <td style="text-align: center;"><?=$pago->clases_titulo?></td>
                        <td style="text-align: center;"><?=$pago->estado?></td>
                    </tr>
                <?php endwhile?>
                </tbody>
            </table>
        </div>
    </div>
</main>