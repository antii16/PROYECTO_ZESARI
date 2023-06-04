
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?=$_ENV['base_url']?>src/sass/estilo.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DATA TABLE -->
    
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css" rel="stylesheet"/>
 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>


 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    

    <script>
        /*Cuando se cliquea el checkbtn, se despliega el menú*/
        $(document).ready(function () {
            $('.checkbtn').click(function () {
                $('.menu-horizontal').toggleClass('show');
            })
        })
    </script>
    <title>Zésari</title>
</head>
<body>
<?php //unset($_SESSION['identity'])?>
<header>
    <span class="nav-bar" id="btnMenu">
        <li class="fas fa-bars">
        </li>
        
    </span>
   
    <div class="logo">
        <a href="<?=$_ENV['base_url']?>"><img src="<?=$_ENV['base_url']?>src/img/logoZesariMorado.png" alt="Logotipo"></a>
    </div>

    <nav class="main-nav">

        <ul class="menu" id="menu">
            
            <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>clase/clases">Clases</a></li>
            <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/equipo">Equipo</a></li>
            <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>navegacion/sobreNosotros">Quiénes somos</a></li>
            <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>blog/blogs">Blog</a></li>
            <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>navegacion/formulario">Contacto</a></li>

            <!-- ADMINISTRADOR -->
            <?php if(isset($_SESSION['admin'])): ?>
            <li class="menu-item container-submenu">
              
                    <a href="#" class="menu-link submenu-btn">Administrador
                        <img class="icono-sub" src="<?=$_ENV['base_url']?>src/img/flecha.png" alt=""> 
                        <img class="imagen-user" src="<?=$_ENV['base_url']?>src/img/<?=$_SESSION['identity']->imagen?>" alt="">
                    </a>
                
                
                <ul class="submenu">
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>perfil">Perfil</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/gestionUsuario">Usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>clase/gestionClase">Clases</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>clase/gestionHorario">Horario</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>blog/gestionBlog">Blogs</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>categoria/gestionCategoria">Categoría</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>logout">Cerrar Sesión</a></li>
                </ul>
            </li>
          

            <!-- EMPLEADO -->
            <?php elseif(isset($_SESSION['empleado'])): ?>
            <li class="menu-item container-submenu">
                <a href="" class="menu-link submenu-btn">Empleado <i class="fas fa-chevron-down"></i>
                
                        <img class="imagen-user" src="<?=$_ENV['base_url']?>src/img/<?=$_SESSION['identity']->imagen?>" alt="">
            </a>
                <ul class="submenu">
                <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/gestionUsuario">Usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>perfil">Perfil</a></li>
                  
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>logout">Cerrar Sesión</a></li>
                </ul>
            </li>
           

            <!-- CLIENTE -->
            <?php elseif(isset($_SESSION['cliente'])): ?>
            <li class="menu-item container-submenu">
                <a href="" class="menu-link submenu-btn">Cliente <i class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/registro">Gestión de usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="crear">Clientes</a></li>
                </ul>
            </li>
          

            <!-- LOGIN -->
            <?php elseif( !isset($_SESSION['identity'])): ?>
            <li class="menu-item"><a class="menu-link login" href="<?=$_ENV['base_url']?>usuario/login">Login</a></li>
            <?php endif; ?>
         </ul>

        
    </nav>

    

</div>
   
            </header>


<script src="<?=$_ENV['base_url']?>src/js/menu.js"></script>
<script src="<?=$_ENV['base_url']?>src/js/dataTable.js"></script>

    <!-- Swiper JS -->
<script src="<?=$_ENV['base_url']?>src/js/carrousel.js"></script>
<script src="<?=$_ENV['base_url']?>src/js/script.js"></script>
<!-- <script src="<?=$_ENV['base_url']?>src/js/cargarFormulario.js"></script> -->
<script src="<?=$_ENV['base_url']?>src/js/contraseña.js"></script>



<!-- Initialize Swiper -->
<script type="text/JavaScript">
    var swiper = new Swiper('.swiper', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        slidesPerView: 1,
        spaceBetween: 10,
        // init: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        /*Puntos donde quiebre*/
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40,
            },

            620: {
                slidesPerView: 2,
                spaceBetween: 40,
            },

            800: {
                slidesPerView: 1.75,
                spaceBetween: 40,
            },

            920: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1000: {
                slidesPerView: 2.5,
                spaceBetween: 40,
            },
            1240: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        }
    });

</script>


</body>
</html>