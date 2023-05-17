
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
    <nav class="nav-menu">
        <div class="logo">
            <a href="<?=$_ENV['base_url']?>"><img src="<?=$_ENV['base_url']?>src/img/logoZesari.png" alt="Logotipo"></a>
        </div>

        <ul class="menu-horizontal">
            <li><a href="<?=$_ENV['base_url']?>clase/clases">Clases</a></li>
            <li><a href="<?=$_ENV['base_url']?>usuario/ver">Entrenadores</a></li>
            <li><a href="<?=$_ENV['base_url']?>home/sobreNosotros">Quiénes somos</a></li>
            <li><a href="<?=$_ENV['base_url']?>blog/ver">Blog</a></li>
            <li><a href="<?=$_ENV['base_url']?>home/formulario">Contacto</a></li>

            <!-- ADMINISTRADOR -->
            <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="">Administrador</a>
                <ul class="menu-vertical">
                    <li><a href="<?=$_ENV['base_url']?>usuario/registro">Usuarios</a></li>
                    <li><a href="<?=$_ENV['base_url']?>clase/gestionClase">Clases</a></li>
                    <li><a href="<?=$_ENV['base_url']?>clase/gestionHorario">Horario</a></li>
                    <li><a href="<?=$_ENV['base_url']?>blog/gestionBlog">Blogs</a></li>
                    <li><a href="<?=$_ENV['base_url']?>usuario/logout">Cerrar Sesión</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- EMPLEADO -->
            <?php if(isset($_SESSION['empleado'])): ?>
            <li><a href="">Empleado</a>
                <ul class="menu-vertical">
                    <li><a href="<?=$_ENV['base_url']?>usuario/registro">Gestión de usuarios</a></li>
                    <li><a href="crear">Clientes</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- CLIENTE -->
            <?php if(isset($_SESSION['cliente'])): ?>
            <li><a href="">Cliente</a>
                <ul class="menu-vertical">
                    <li><a href="<?=$_ENV['base_url']?>usuario/registro">Gestión de usuarios</a></li>
                    <li><a href="crear">Clientes</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <!-- LOGIN -->
            <?php if( !isset($_SESSION['identity'])): ?>
            <li><a href="<?=$_ENV['base_url']?>usuario/login">Login</a></li>
            <?php endif; ?>
         </ul>

        <label class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
    </nav>


    
</body>
</html>