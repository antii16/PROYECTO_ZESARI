<?php
use Models\Clase;
?>

<header class="nav-clases"></header>

<main>
<?php $clases = Clase::obtenerClases(); ?>
    <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <div>
            <img src="<?=$_ENV['base_url']?>/src/img/<?=$clase->imagen?>" alt="Card image cap">
            <div>
                <h5><?=$clase->titulo?></h5>
                <p><?=$clase->descripcion?></p>
                <a href="#">Go somewhere</a>
            </div>
        </div>
    <?php endwhile?>


</main>