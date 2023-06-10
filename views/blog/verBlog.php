<main>

    <!-- HEADER CONTENIDO -->
<div class="main-contenido">
<?php while($blog = $blogs->fetch(PDO::FETCH_OBJ)):?>
    <div class="migas">
        
        <a href="<?= $_ENV['base_url'] ?>blogs">Blog</a> 
        <span>></span>
        <span><?= $blog->titulo?></span>

    </div>
    <!-- migas de pan -->
    <section class="post-header">
        <div class="header-content post-container">
           
            <h1 class="header-title"><?= $blog->titulo?></h1>
            <img src="<?= $_ENV['base_url'] ?>/src/img/<?= $blog->imagen?>" alt="Card image cap" class="header-img">
        </div>
    </section>

    <section class="post-content post-container">
    
    <h2 class="sub-heading"><?= $blog->descripcion?></h2>
    <p class="post-text"><?= $blog->texto?></p>
    
</section>

<?php endwhile?>
</div>
</main>