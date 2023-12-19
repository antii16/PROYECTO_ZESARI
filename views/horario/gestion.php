<?php

use Models\Horario; ?>
<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-submenu">
        <div class="overlay">
            <h1>Gestión de Horario</h1>
        </div>
    </div>

    <!-- MAIN CONTENIDO -->
    <div class="main-contenido">
        <div class="crud">
            <div id="container_boton_horario">
                <div class="añadir">
                    <a href="<?= $_ENV['base_url'] ?>horario/crear">Mes +</a>
                </div> 
                <div class="añadir">
                    <a href="<?= $_ENV['base_url'] ?>horario/editarTodo">Editar</a>
                </div> 
            </div>
            <table id="tabla" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                            <th>Día y hora</th>
                            <th>Categoría</th>
                            <th>Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $horarios = Horario::obtenerHorario(); ?>
                    <?php while ($horario = $horarios->fetch(PDO::FETCH_OBJ)) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $horario->fecha ?></td>
                            <td style="text-align: center;"><?= $horario->id_categoria ?></td>
                            <td style="text-align: center;">
                                <a class="borrar" href="<?= $_ENV['base_url'] ?>horario/borrar/<?=$horario->id?>">Borrar</a>
                                <a class="editar" href="<?= $_ENV['base_url'] ?>horario/editar/<?=$horario->id ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody> 
            </table>
        </div>
    </div>

</main>
