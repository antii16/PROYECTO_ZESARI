<?php

use Models\Blog;
?>

<main>

    <!-- HEADER CONTENIDO -->
    <div class="header-secundario-blog">
        <div class="overlay">
            <h1>Nuestros blogs</h1>

        </div>

    </div>
    <div class="main-contenido">
            <div class="blogs">
            <?php $blogs = Blog::obtenerBlogs(); ?>
            <?php while ($blog = $blogs->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <img src="<?= $_ENV['base_url'] ?>/src/img/<?=$blog->imagen?>" alt="Card image cap">
                    <div class="contenido">
                        <a href="<?= $_ENV['base_url'] ?>blog/ver/<?=$blog->id?>" class="post-title"><?=$blog->titulo?></a>
                        <span class="post-date"><?=$blog->fecha?></span>
                        <p class="post-description"><?=$blog->descripcion?></p>
                        <div class="profile">
                            <img src="<?= $_ENV['base_url'] ?>/src/img/marisaalvarez.png" alt="" class="profile-img">
                            <span>Marisa Alvarez</span>

                        </div>
                    </div>
                </div>

                <?php endwhile ?>
            </div>
    </div>
</main>