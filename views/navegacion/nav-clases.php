<?php

use Models\Categoria;
?>

<main>
    <div class="main-contenido">
        <h1>Nuestras clases</h1>
        <div class="filtro">

        </div>
        <div class="clases">
            <?php $categorias = Categoria::obtenerCategorias(); ?>
            <?php while ($categoria = $categorias->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="caja">
                    <div class="imagen">
                        <picture>
                            <img src="<?= $_ENV['base_url'] ?>/src/img/<?= $categoria->imagen ?>" alt="Card image cap">
                        </picture>
                    </div>

                    <div class="contenido">
                        <h5><?= $categoria->titulo ?></h5>
                        <a href="#">Saber más</a>

                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</main>