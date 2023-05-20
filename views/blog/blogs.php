<?php
use Models\Blog;
?>

<!-- <header>IMAGEN</header> -->

<?php $blogs = Blog::obtenerBlogs(); ?>
    <?php while($blog = $blogs->fetch(PDO::FETCH_OBJ)):?>
        <div>
            <img src="<?=$_ENV['base_url']?>/src/img/<?=$blog->imagen?>" alt="Card image cap">
            <div>
                <h5><?=$blog->titulo?></h5>
                <p><?=$blog->descripcion?></p>
                <a href="#">Go somewhere</a>
            </div>
        </div>
    <?php endwhile?>

