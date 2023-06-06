<?php
use Models\Usuario;
?>

<main>
    <div class="main-contenido">
        <h1>Nuestro equipo</h1>

        <div class="equipo">
            <?php $usuarios = Usuario::obtenerProfesor(); ?>
            <?php while ($usuario = $usuarios->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <div class="imagen">
                        <picture>
                            <img src="<?= $_ENV['base_url'] ?>/src/img/<?= $usuario->imagen ?>" alt="Card image cap">
                        </picture>
                    </div>

                    <div class="contenido">
                        <h5><?= $usuario->nombre ?></h5>
                        <a href="#">Saber más</a>

                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>