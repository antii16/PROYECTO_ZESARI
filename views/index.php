<?php
use Models\Clase;
use Models\Usuario;
use Models\Blog;
?>
<!--HEADER INICIO-->
<header class="inicio">
    <div class="header-contenido">
        <h1>Tu centro de salud y bienestar</h1>
        <hr>
        <p>
        La buena condición física es el primer requisito para la felicidad
        </p>
        <a href="./html/sobreNosotros.html">Leer Más</a>
    </div>
</header>

<main>

    <h2>¿Por qué elegir Zésari?</h2>

    <section class="principios">
        <div class="caja">
            <div class="image">
                <picture>
                    <!-- <source type="image/jpg" media="(max-width: 799px)" srcset="img/floral3_300.jpg" />
                    <source type="image/jpg" media="(min-width: 800px) and (max-width: 1199px)" srcset="img/floral3_500.jpg" />
                    <source type="image/jpg" media="(min-width: 1200px) and (max-width: 1799px)" srcset="img/floral3_700.jpg" />
                    <source type="image/jpg" media="(min-width: 1800px)" srcset="img/floral3_1000.jpg" /> -->
                    <img src="<?=$_ENV['base_url']?>src/img/pasion.png" alt="Pasion por el pilates">
                </picture>
            </div>
        
            <div class="contenido">
                <h3>Pasión por el pilates</h3>
                <p>En Zesari intentamos trasmitir la pasión del pilates en ti.</p>
            </div>
        </div>

        <div class="caja">
            <div class="image">
                <picture>
                    <!-- <source type="image/jpg" media="(max-width: 799px)" srcset="img/floral3_300.jpg" />
                    <source type="image/jpg" media="(min-width: 800px) and (max-width: 1199px)" srcset="img/floral3_500.jpg" />
                    <source type="image/jpg" media="(min-width: 1200px) and (max-width: 1799px)" srcset="img/floral3_700.jpg" />
                    <source type="image/jpg" media="(min-width: 1800px)" srcset="img/floral3_1000.jpg" /> -->
                    <img src="<?=$_ENV['base_url']?>src/img/instalacion.png" alt="Buenas instalaciones">
                </picture>
            </div>
        
            <div class="contenido">
                <h3>Ambiente único y exclusivo</h3>
                <p>Nuestro centro cuenta con un lugar excelente para practicar cualquier ejercicio.</p>
            </div>
        </div>
        <div class="caja">
            <div class="image">
            <picture>
                    <!-- <source type="image/jpg" media="(max-width: 799px)" srcset="img/floral3_300.jpg" />
                    <source type="image/jpg" media="(min-width: 800px) and (max-width: 1199px)" srcset="img/floral3_500.jpg" />
                    <source type="image/jpg" media="(min-width: 1200px) and (max-width: 1799px)" srcset="img/floral3_700.jpg" />
                    <source type="image/jpg" media="(min-width: 1800px)" srcset="img/floral3_1000.jpg" /> -->
                    <img src="<?=$_ENV['base_url']?>src/img/profesional.png" alt="Grandes profesionales">
                </picture>
            </div>
        
            <div class="contenido">
                <h3>Gran equipo y magníficas instalaciones</h3>
                <p>Grandes profesionales y las instalaciones muy amplias luminoso un lugar que invita al bienestar.</p>
            </div>
        </div>
        <div class="caja">
            <div class="image">
            <picture>
                    <!-- <source type="image/jpg" media="(max-width: 799px)" srcset="img/floral3_300.jpg" />
                    <source type="image/jpg" media="(min-width: 800px) and (max-width: 1199px)" srcset="img/floral3_500.jpg" />
                    <source type="image/jpg" media="(min-width: 1200px) and (max-width: 1799px)" srcset="img/floral3_700.jpg" />
                    <source type="image/jpg" media="(min-width: 1800px)" srcset="img/floral3_1000.jpg" /> -->
                    <img src="<?=$_ENV['base_url']?>src/img/adecuado.png" alt="Clases adaptadas">
                </picture>
            </div>
        
            <div class="contenido">
                <h3>Clases adaptadas a ti</h3>
                <p>Nuestros centro procura ofrecerte la clase que más se adapte a ti.</p>
            </div>
        </div>
    </section>

    <h2>Nuestras clases</h2>
    <section class="clases">
        

        <?php $clases = Clase::obtenerClases(); ?>
        <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <div class="clase">
            <div class="image">
                <picture>

                <img src="<?=$_ENV['base_url']?>/src/img/<?=$clase->imagen?>" alt="Card image cap">
                </picture>

            </div>
            
            <div class="contenido">

                <h5><?=$clase->titulo?></h5>
                <p><?=$clase->descripcion?></p>
                <a href="#">Saber más</a>
            </div>
        </div>
    <?php endwhile?>
    </section>

     <!--IMAGEN SCROLL-->

     <div class="imagen_scroll"></div>

     <h2>Nuestro equipo</h2>
     <h3>Siempre dispuesto a ayudarte</h3>

     <section class="equipo">

     <?php $equipo = Usuario::obtenerProfesor(); ?>
        <?php while($empleado = $equipo->fetch(PDO::FETCH_OBJ)):?>
        <div class="">
            <div class="">
                <picture>

                <img src="<?=$_ENV['base_url']?>/src/img/<?=$empleado->imagen?>" alt="Card image cap">
                </picture>

            </div>
            
            <div class="">

                <h5><?=$empleado->nombre?><?=$empleado->apellidos?></h5>
                <p>Descripcion del empleado</p>
                <a href="#">Ver Ficha</a>
            </div>
        </div>
    <?php endwhile?>

     </section>


     <h2>últimas noticias</h2>
     <h3>Descubre las últimas noticias de nuestro centro</h3>


     <section class="blogs">

<?php $blogs = Blog::obtenerBlogs(); ?>
   <?php while($blog = $blogs->fetch(PDO::FETCH_OBJ)):?>
   <div class="">
       <div class="">
           <picture>

           <img src="<?=$_ENV['base_url']?>/src/img/<?=$blog->imagen?>" alt="Card image cap">
           </picture>

       </div>
       
       <div class="">

           <h5><?=$blog->titulo?></h5>
           <p><?=$blog->descripcion?></p>
           <a href="#">Ver Noticia</a>
       </div>
   </div>
<?php endwhile?>

</section>


</main>

