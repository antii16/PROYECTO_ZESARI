<?php
use Models\Blog;
?>

<main>
    <div class="main-contenido">
        <h1>Nuestros blogs</h1>
        <div class="blogs">
            <?php $blogs = Blog::obtenerBlogs(); ?>
            <?php while ($blog = $blogs->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <div class="imagen">
                        <picture>
                            <img src="<?= $_ENV['base_url'] ?>/src/img/<?= $blog->imagen ?>" alt="Card image cap">
                        </picture>
                    </div>

                    <div class="contenido">
                        <h5><?= $blog->nombre ?></h5>
                        <a href="#">Saber más</a>

                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>