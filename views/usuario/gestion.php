<?php

use Models\Usuario; ?>
<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Gestión de Usuarios</h1>
        </div>
    </div>

    <!-- MAIN CONTENIDO -->
    <div class="main-contenido">
        <div class="crud">
            <div class="añadir">
                <a class="add" href="<?= $_ENV['base_url'] ?>usuario/registro">Añadir +</a>
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
                                <a class="ver" href="<?= $_ENV['base_url'] ?>usuario/ver/<?=$usuario->id?>">Ver</a>
                                <a class="pagar" href="<?= $_ENV['base_url'] ?>pagar/<?= $usuario->id ?>">Pagar</a>
                                <a class="volver" href="<?= $_ENV['base_url'] ?>horario/apuntar/<?= $usuario->id ?>">Apuntar</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</main>