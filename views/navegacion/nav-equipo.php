<?php
use Models\Usuario;
?>

<main>
      <!-- HEADER CONTENIDO -->
      <div class="header-secundario-blog">
        <div class="overlay">
        <h1>Nuestro equipo</h1>

        </div>

    </div>
    <div class="main-contenido">
        <div class="equipo">
            <?php $usuarios = Usuario::obtenerProfesor(); ?>
            <?php while ($usuario = $usuarios->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <img src="<?= $_ENV['base_url'] ?>/src/img/<?=$usuario->imagen?>" alt="Card image cap">
                    <div class="contenido">
                        <p class="post-title"><?=$usuario->nombre?> <?=$usuario->apellidos?></p>
                        <p class="post-description"><?=$usuario->profesion?></p>
                        <p class="post-description"><?=$usuario->experiencia?> de experiencia</p>
                        <div class="post-redes">
                            <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
                            <a href="https://es-es.facebook.com/" class="fab fa-facebook"></a>
                            <a href="https://twitter.com/?lang=es" class="fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>