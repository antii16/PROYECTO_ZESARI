<?php
use Models\Categoria;
use Models\Usuario;
use Models\Blog;
?>

<main>

<div class="inicio">
 <div class="header-contenido">
        <h1>ZÉSARI</h1>
        <h1>Tu centro de salud y bienestar</h1>
        <hr>
        <p>
        La buena condición física es el primer requisito para la felicidad
        </p>
        <a href="<?=$_ENV['base_url']?>sobreNosotros">Leer Más</a>
    </div>
</div>

<div class="main-contenido">
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

 <!--IMAGEN SCROLL-->

 <!-- <div class="imagen_scroll"></div> -->
 

 <section id="contactaIndex">
 <div class="caja">
    <img src="<?=$_ENV['base_url']?>src/img/recepcion.jpg" alt="">
 </div>

 <div class="caja">
    <h2>Contacta con nosotros</h2>
    <h3>Para cualquier duda escríbenos</h3>
    <a href="<?=$_ENV['base_url']?>contacto">Contacto</a>
 </div>

 </section>
 </div>
</main>



