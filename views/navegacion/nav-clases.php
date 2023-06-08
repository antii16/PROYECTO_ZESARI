<?php

use Models\Categoria;
?>

<main>
    
           <!-- HEADER CONTENIDO -->
           <div class="header-secundario-blog">
        <div class="overlay">
            <h1>Nuestras clases</h1>

        </div>

    </div>
 
    <div class="main-contenido">
        <div class="clases">
            <?php $categorias = Categoria::obtenerCategorias(); ?>
            <?php while ($categoria = $categorias->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <img src="<?= $_ENV['base_url'] ?>/src/img/<?=$categoria->imagen?>" alt="Card image cap">
                    <div class="contenido">
                        <p class="post-title"><?=$categoria->titulo?></p>
                        <p class="post-description"><?=$categoria->descripcion?></p>
                        <a href="<?= $_ENV['base_url'] ?>clase/ver/<?=$categoria->id?>" class="post-saber">Saber Más</a>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>