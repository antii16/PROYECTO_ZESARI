<?php use Models\Blog; ?>

<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-secundario-blog">
        <div class="overlay">
            <h1>Blog</h1>
        </div>
        <div class="migas">
            <a href="<?= $_ENV['base_url'] ?>">Inicio</a> 
            <span>></span>
            <span>Blog</span>
        </div>
    </div>
    <div class="main-contenido">
            <div class="blogs">
            <?php $blogs = Blog::obtenerBlogs(); ?>
            <?php while ($blog = $blogs->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <img src="<?= $_ENV['base_url'] ?>/src/img/<?=$blog->imagen?>" alt="Card image cap">
                    <div class="texto-hover">
                        <a href="<?= $_ENV['base_url'] ?>blog/ver/<?=$blog->id?>" class="post-title"><?=$blog->titulo?></a>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
    </div>
</main>