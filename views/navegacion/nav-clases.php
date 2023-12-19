<?php use Models\Categoria; ?>
<main>
    <!-- HEADER CONTENIDO -->
    <div class="header-secundario-clases">
        <div class="overlay">
            <h1>Clases</h1>
            <p>Experiencia de calidad única.</p>
        </div>
        <div class="migas">
            <a href="<?= $_ENV['base_url'] ?>">Inicio</a> 
            <span>></span>
            <span>Clases</span>
        </div>
    </div>
    <div class="main-contenido">
        <div class="clases">
            <?php $categorias = Categoria::obtenerCategorias(); ?>
            <?php while ($categoria = $categorias->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <a href="<?= $_ENV['base_url'] ?>categoria/ver/<?=$categoria->id?>">
                        <img src="<?= $_ENV['base_url'] ?>/src/img/<?=$categoria->imagen?>" alt="Card image cap">
                    <div class="contenido">
                        <p class="post-title"><?=$categoria->titulo?></p>
                    </div>
                    </a>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>