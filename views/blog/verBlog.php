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
    
    <h2 class="sub-heading">Subtitle</h2>
    <p class="post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum labore ex maxime officiis quo earum. Ipsam harum modi unde dolore doloremque! Itaque dicta enim veritatis explicabo et rem. Vitae, nihil.</p>
    <p class="post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum labore ex maxime officiis quo earum. Ipsam harum modi unde dolore doloremque! Itaque dicta enim veritatis explicabo et rem. Vitae, nihil.</p>
    
</section>

<?php endwhile?>
</div>
</main>