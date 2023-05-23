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

<section>
<h2>¿Por qué elegir Zésari?</h2>
    <h3>Estas son algunas de nuestras razones</h3>

    <div class="principios">
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
                <h4>Pasión por el pilates</h4>
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
                <h4>Ambiente único y exclusivo</h4>
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
                <h4>Gran equipo y magníficas instalaciones</h4>
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
                <h4>Clases adaptadas a ti</h4>
                <p>Nuestros centro procura ofrecerte la clase que más se adapte a ti.</p>
            </div>
        </div>
</div>

</section>

    <!-------------CLASES-------------------------->
<section>

<h2>Nuestras clases</h2>
    <h3>Estas son nuestras clases disponibles</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
    
        <?php $clases = Clase::obtenerClases(); ?>
        <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <div class="col">
            <div class="card">
                <picture>
                <img class="card-img-top" src="<?=$_ENV['base_url']?>/src/img/<?=$clase->imagen?>" alt="Card image cap">
                </picture>

            </div>
            
            <div class="card-body">

                <h5 class="card-title"><?=$clase->titulo?></h5>
                <p class= "card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                <a href="#">Saber más</a>
            </div>
        </div>
    <?php endwhile?>
        </div>

</section>

    

     <!--IMAGEN SCROLL-->

     <div class="imagen_scroll"></div>


       <!--EQUIPO-->

     <section>

     <h2>Nuestro equipo</h2>
     <h3>Siempre dispuesto a ayudarte</h3>

     <div class="row row-cols-1 row-cols-md-4 g-4">

     <?php $equipo = Usuario::obtenerProfesor(); ?>
        <?php while($empleado = $equipo->fetch(PDO::FETCH_OBJ)):?>
        <div class="col">
            <div class="card">
                <picture>

                <img class="card-img-top" src="<?=$_ENV['base_url']?>/src/img/<?=$empleado->imagen?>" alt="Card image cap">
                </picture>

            </div>
            
            <div class="card-body">

                <h5 class="card-title"><?=$empleado->nombre?><?=$empleado->apellidos?></h5>
                <p class="card-text">Descripcion del empleado</p>
                <a href="#">Ver Ficha</a>
            </div>
        </div>
    <?php endwhile?>

        </div>

     </section>

     <!--BLOGS--> 

     <section>

     <h2>Últimas noticias</h2>
     <h3>Descubre las últimas noticias de nuestro centro</h3>


     <!-- <div class="contenedor-blogs">

     <div class="swiper-contenedor-blogs mySwiper">
        <div class="swiper-wrapper"> -->

            <div class="row row-cols-1 row-cols-md-4 g-4">

<?php $equipo = Blog::ObtenerBlogs(); ?>
   <?php while($empleado = $equipo->fetch(PDO::FETCH_OBJ)):?>
   <div class="col">
       <div class="card">
           <picture>

           <img class="card-img-top" src="<?=$_ENV['base_url']?>/src/img/<?=$empleado->imagen?>" alt="Card image cap">
           </picture>

       </div>
       
       <div class="card-body">

           <h5 class="card-title"><?=$empleado->titulo?></h5>
           <p class="card-text">Descripcion del blog</p>
           <a href="#">Ver Ficha</a>
       </div>
   </div>
<?php endwhile?>

   </div>


        <!-- </div>
        <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
     </div>

   </div> -->

     </section>

</main>



