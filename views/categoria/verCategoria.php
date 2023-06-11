<main>
    <!-- HEADER CONTENIDO -->
    <div class="main-contenido">
        <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
        <div class="migas">
            
            <a href="<?= $_ENV['base_url'] ?>clases">Clases</a> 
            <span>></span>
            <span><?= $categoria->titulo?></span>

        </div>
        <!-- migas de pan -->
        <section class="post-header">
            <div class="header-content post-container">
                <h1 class="header-title"><?= $categoria->titulo?></h1>
                <img src="<?= $_ENV['base_url'] ?>/src/img/<?= $categoria->imagen?>" alt="Card image cap" class="header-img">
            </div>
        </section>

        <section class="post-content post-container">
            <p class="post-text"><?= $categoria->descripcion?></p>
        </section>

        <?php endwhile?>
    </div>
</main>