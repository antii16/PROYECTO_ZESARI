<?php

use Models\Usuario; ?>
<main>
<div class="main-contenido">
<h1>Gestión de Usuarios</h1>
<div class="crud">
    <div class="añadir">
        <a  href="<?= $_ENV['base_url'] ?>usuario/registro">Añadir <i class="fa-sharp fa-solid fa-user-plus"></i></a>
    </div>
    
    <table id="tabla" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $usuarios = Usuario::obtenerUsuarios(); ?>
            <?php while ($usuario = $usuarios->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <td style="text-align: center;"><?= $usuario->id ?></td>
                    <td style="text-align: center;"><?= $usuario->nombre ?></td>
                    <td style="text-align: center;"><?= $usuario->apellidos ?></td>
                    <td style="text-align: center;"><?= $usuario->email ?></td>
                    <td style="text-align: center;"><?= $usuario->rol ?></td>
                    <td style="text-align: center;">
                    
                        
                        <a class="btn btn-success" href="<?= $_ENV['base_url'] ?>usuario/ver/<?=$usuario->id?>"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-success" href="<?= $_ENV['base_url'] ?>pagar/<?= $usuario->id ?>"><i class="fa-solid fa-comment-dollar"></i></a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

</div>
            </div>
</main>