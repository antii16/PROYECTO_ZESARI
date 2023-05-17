<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../sass/estiloContacto.scss">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script>
        $(document).ready(function() {
            $('.checkbtn').click(function() {
                $('.nav-links').toggleClass('show');
            })

        })
    </script>
    <title>Jazmin</title>
</head>
<body>

    <!--HEADER-->
    <header class="tituloContacto">
        <div class="titulo">
            <h1>Contacto</h1> 
        </div>
    </header>

    <!--MAIN-->
    <main>
        <h2>Contacta con nuestra empresa</h2>

        <div class="contacto">
            <div id="mensaje">
                <form action="#">
                    <p>
                        <input type="text" placeholder="Nombre" required>
                    </p>
                    <p>
                        <input type="email" placeholder="Email" required>
                    </p>
        
                    <p>
                        <textarea name="textarea" rows="10" cols="50" required>Escribe tu mensaje</textarea>
                    </p>
                    <p>
                        <button>Enviar</button>
                    </p>
                </form>
            </div>
    
            <div id="datos">
                <h3>Datos</h3>
                <ul>
                    <li>Dirección: 831 Elm St, New York</li>
                    <li>Telefono: 666-888-999</li>
                    <li>E-mail: florjazmin@gmail.com</li>
                </ul>
               
            </div>
        </div>

        <!--MAPA-->
        <h2>Estamos ubicados aquí</h2>
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
              style="border:0" allowfullscreen></iframe>
          </div>
       
    </main>

    <!--FOOTER-->
    <footer class="pie">
        <div id="contacto">
            <h3>Contacto</h3>
            <ul>
                <li>Dirección: 831 Elm St, New York</li>
                <li>Telefono: 666-888-999</li>
                <li>E-mail: florjazmin@gmail.com</li>
            </ul>
        </div>

        <div id="redes">
            <h1>JAZMIN</h1>
            <ul>
                <li><a href="https://www.instagram.com/" class="fab fa-instagram"></a></li>
                <li><a href="https://es-es.facebook.com/" class="fab fa-facebook"></a></li>
                <li><a href="https://twitter.com/?lang=es" class="fab fa-twitter"></a></li>
            </ul>
            <p>Copyright &copy; 2022</p>  
        </div>
        <div id="informacion">
            <h3>Información</h3>
            <ul>
                <li><a href="sobreNosotros.html">Sobre nosotros</a></li>
                <li><a href="#">Aviso legal</a></li>
                <li><a href="#">Política de cookies</a></li>
                <li><a href="#">Política de privacidad</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>