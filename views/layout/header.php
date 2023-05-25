
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?=$_ENV['base_url']?>src/sass/estilo.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
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
                <a href="#" class="menu-link submenu-btn">Administrador <i class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/registro">Usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>clase/gestionClase">Clases</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>clase/gestionHorario">Horario</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>blog/gestionBlog">Blogs</a></li>
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/logout">Cerrar Sesión</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- EMPLEADO -->
            <?php if(isset($_SESSION['empleado'])): ?>
            <li class="menu-item container-submenu"><a href="">Empleado</a>
                <ul class="submenu">
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/registro">Gestión de usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="crear">Clientes</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- CLIENTE -->
            <?php if(isset($_SESSION['cliente'])): ?>
            <li class="menu-item container-submenu"><a href="">Cliente</a>
                <ul class="submenu">
                    <li class="menu-item"><a class="menu-link" href="<?=$_ENV['base_url']?>usuario/registro">Gestión de usuarios</a></li>
                    <li class="menu-item"><a class="menu-link" href="crear">Clientes</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- LOGIN -->
            <?php if( !isset($_SESSION['identity'])): ?>
            <li class="menu-item"><a class="menu-link login" href="<?=$_ENV['base_url']?>usuario/login">Login</a></li>
            <?php endif; ?>
         </ul>

        
    </nav>

</div>
   
            </header>
<script src="<?=$_ENV['base_url']?>src/js/menu.js"></script>

    <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="<?=$_ENV['base_url']?>src/js/carrousel.js"></script>
</body>
</html>