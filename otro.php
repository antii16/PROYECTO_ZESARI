    <!-------------CLASES-------------------------->
    <section>

<h2>Nuestras clases</h2>
    <h3>Estas son nuestras clases disponibles</h3>
    <div class="clases">
    
        <?php $categorias = Categoria::obtenerCategorias(); ?>
        <?php while($categoria = $categorias->fetch(PDO::FETCH_OBJ)):?>
        <div class="caja">
            
            <div class="imagen">
                <picture>
                    <img src="<?=$_ENV['base_url']?>/src/img/<?=$categoria->imagen?>" alt="Card image cap">
                </picture>
            </div>
                
            <div class="contenido">

                <h5><?=$categoria->titulo?></h5>
              
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

     <div class="equipo">

     <?php $equipo = Usuario::obtenerProfesor(); ?>
        <?php while($empleado = $equipo->fetch(PDO::FETCH_OBJ)):?>
        <div class="caja">
        <div class="imagen">
                <picture>

                <img class="card-img-top" src="<?=$_ENV['base_url']?>/src/img/<?=$empleado->imagen?>" alt="Card image cap">
                </picture>
        </div>
            <div class="contenido">

                <h5 class="card-title"><?=$empleado->nombre?><?=$empleado->apellidos?></h5>
                <p class="card-text">Descripcion del empleado</p>
                <a href="<?=$_ENV['base_url']?>verFichaEmpleado">Ver Ficha</a>
            </div>
        </div>
    <?php endwhile?>
    </div>
      

     </section>

     <!--BLOGS--> 

     <section>

     <h2>Últimas noticias</h2>
     <h3>Descubre las últimas noticias de nuestro centro</h3>

     <div class="contenedor-blogs">
            <div class="swiper blogs">
                <div class="swiper-wrapper">

                <?php $blogs = Blog::obtenerBlogs(); ?>
                <?php while($blog = $blogs->fetch(PDO::FETCH_OBJ)):?>
                    <div class="swiper-slide">
                        <figure>
                            <picture>
                                <!-- <source type="image/jpg" media="(max-width: 799px)" srcset="./img/sakura_300.jpg" />
                                <source type="image/jpg" media="(min-width: 800px) and (max-width: 1199px)" srcset="./img/sakura_500.jpg" />
                                <source type="image/jpg" media="(min-width: 1200px) and (max-width: 1799px)" srcset="./img/sakura_700.jpg" />
                                <source type="image/jpg" media="(min-width: 1800px)" srcset="./img/sakura_1000.jpg" /> -->
                                <img src="<?=$_ENV['base_url']?>/src/img/<?=$blog->imagen?>" alt="Flor sakura">
                            </picture>
                            <div class="texto">
                                <h3><?=$blog->titulo?></h3>
                                <p><?=$blog->descripcion?></p>
                                <a href="./html/verBlog.html">Leer</a>
                            </div>
                        </figure>
                    </div>
                <?php endwhile?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

            </div>
        </div>


     </section>



     

<!--FOOTER-->
<footer class="pie">

<div class="cajaArriba">

    <div id="logoFooter">
  
        <a href="<?=$_ENV['base_url']?>"><img src="<?=$_ENV['base_url']?>src/img/logoForma.png" alt="Logotipo"></a>
  
       
    </div>
    
    <div id="contacto">
        <ul>
            <li>Dirección: Avenida Constitución 20, local 119, 18012 Granada</li>
            <li>Telefono: 666-888-999</li>
            <li>Email: info@pilateszesari.es</li>
            <hr>
            <li>HORARIO</li>
            <hr>
            <li>Lunes - Viernes de 8:00h a 22:00h</li>
        </ul>
    </div>

    <div id="informacion">
    <ul>
        <li><a href="sobreNosotros.html">Sobre nosotros</a></li>
        <li><a href="#">Aviso legal</a></li>
        <li><a href="#">Política de cookies</a></li>
        <li><a href="#">Política de privacidad</a></li>
    </ul>
</div>

</div>


<div class="cajaAbajo">

<div id="redes">
   
    <ul>
        <li><a href="https://www.instagram.com/" class="fab fa-instagram"></a></li>
        <li><a href="https://es-es.facebook.com/" class="fab fa-facebook"></a></li>
        <li><a href="https://twitter.com/?lang=es" class="fab fa-twitter"></a></li>
    </ul>

    <p>Copyright &copy; 2022</p> 
</div>

</div>  
</footer>

<style>
     .clases {
        display: grid;
        padding: 10px;
        grid-template-columns: 1fr 1fr 1fr;

        .caja {
            width: 200px;
            height: 380px;
            margin: 20px;
            overflow: hidden;
            background-color: $blanco;
            cursor: default;
            // border: 5px solid #321c3d;
            transition: all 400ms ease;

            .imagen {
                height: 250px;

                img {
                    width: 100%;
                    height: 100%;
                }
            }



            .contenido {
                height: 150px;
                text-align: center;
                padding: 15px;
                display: flex;
                flex-direction: column;
                justify-content: center;

                h5 {
                    font-size: 20px;
                    padding-bottom: 20px;
                }

               
                
                    a {
                        background-color: #D96704;
                        border-radius: 10px;
                        padding: 10px;
                        color: #fff;
                    }
                
                
                
            }


            // &:hover {
            //     box-shadow: 5px 5px 20px;
            //     transform: translateY(-3%);
            // }
        }
    }



    .equipo {
        display: grid;
        padding: 10px;
        grid-template-columns: 1fr 1fr 1fr;

        .caja {
            display: flex;
            flex-direction: column;
            width: 100%;
            width: 300px;
            height: 380px;
            margin: 20px;
            background-color: $blanco;
            cursor: default;
            // border: $bordeNegro;
            transition: all 400ms ease;

            .imagen {
                height: 290px;
                
                img {
                    width: 100%;
                    height: 100%;
                }}

            .contenido {
                text-align: center;
                padding: 15px;

                p {
                    padding: 10px;
                    letter-spacing: $espaciadoPA
                }

                a {
                    padding: 10px;
                    color: $negro;
                    letter-spacing: 1px;
                    border: $bordeNegro;
                }
            }

        }

        // .caja:hover {
        //     box-shadow: 5px 5px 20px;
        //     transform: translateY(-3%);
        // }


        @include movil-max(movil-max) {
            width: 100%;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;

            .caja {
                width: 70%;
                height: 95%;
            }
        }


        @include ordenador-4k(ordenador-4k) {
            margin-top: 100px;

        }

    }
</style>