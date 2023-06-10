<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?= $_ENV['base_url'] ?>src/sass/estilo.css">
    <!-- CKEditor -->
    <script type="text/javascript" src="/PROYECTO_ZESARI/ckeditor/ckeditor.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- FUENTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DATA TABLE -->
    <link rel="stylesheet" href="http://localhost/PROYECTO_ZESARI/DataTables/DataTables-1.13.4/css/jquery.dataTables.min.css">
    <link href="http://localhost/PROYECTO_ZESARI/DataTables/Buttons-2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://localhost/PROYECTO_ZESARI/DataTables/Responsive-2.4.1/css/responsive.dataTables.min.css">
    
  

    <title>Zésari</title>
</head>

<body>
    <?php //unset($_SESSION['identity']) Base style - hover
    ?>
    <header>
        <span class="nav-bar" id="btnMenu">
            <li class="fas fa-bars">
            </li>

        </span>

        

        <nav class="main-nav">
            <div class="logo">
                <a href="<?= $_ENV['base_url'] ?>"><img src="<?= $_ENV['base_url'] ?>src/img/logoZesariMorado.png" alt="Logotipo"></a>
            </div>

            <ul class="menu" id="menu">

                <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>clases">Clases</a></li>
                <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>equipo">Equipo</a></li>
                <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>blogs">Blog</a></li>
                <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>sobreNosotros">Quiénes somos</a></li>
                <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>contacto">Contacto</a></li>

                <!-- ADMINISTRADOR -->
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="menu-item container-submenu">

                        <a href="#" class="menu-link submenu-btn">Administrador <i class="fas fa-chevron-down"></i>
                            <img class="imagen-user" src="<?= $_ENV['base_url'] ?>src/img/<?= $_SESSION['identity']->imagen ?>" alt="">
                        </a>


                        <ul class="submenu">
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>perfil">Perfil</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>usuario/gestionUsuario">Usuarios</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>clase/gestionClase">Clases</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>clase/gestionHorario">Horario</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>blog/gestionBlog">Blogs</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>categoria/gestionCategoria">Categoría</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>pago/gestionPago">Pago</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>logout">Cerrar Sesión&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a></li>
                            
                        </ul>
                    </li>
                    

                    <!-- EMPLEADO -->
                <?php elseif (isset($_SESSION['empleado'])) : ?>
                    <li class="menu-item container-submenu">
                        <a href="" class="menu-link submenu-btn">Empleado <i class="fas fa-chevron-down"></i>

                            <img class="imagen-user" src="<?= $_ENV['base_url'] ?>src/img/<?= $_SESSION['identity']->imagen ?>" alt="">
                        </a>
                        <ul class="submenu">
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>usuario/gestionUsuario">Usuarios</a></li>
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>perfil">Perfil</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>logout">Cerrar Sesión</a></li>

                    <!-- CLIENTE -->
                <?php elseif (isset($_SESSION['cliente'])) : ?>
                    <li class="menu-item container-submenu">
                        <a href="" class="menu-link submenu-btn">Cliente <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>usuario/registro">Gestión de usuarios</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a class="menu-link" href="<?= $_ENV['base_url'] ?>logout">Cerrar Sesión</a></li>

                    <!-- LOGIN -->
                <?php elseif (!isset($_SESSION['identity'])) : ?>
                    <li class="menu-item"><a class="menu-link login" href="<?= $_ENV['base_url'] ?>usuario/login">Login</a></li>
                <?php endif; ?>
            </ul>


        </nav>



        </div>

    </header>

    <!-- PROPIOS -->
    <script src="<?= $_ENV['base_url'] ?>src/js/menu.js"></script>
    <script src="<?= $_ENV['base_url'] ?>src/js/script.js"></script>
    <script src="<?= $_ENV['base_url'] ?>src/js/contraseña.js"></script>
    <script src="<?=$_ENV['base_url']?>src/js/dataTable.js"></script>
    <script src="<?=$_ENV['base_url']?>src/js/horario.js"></script>
    <script src="<?=$_ENV['base_url']?>src/js/textareaCKeditor.js"></script>
   
    <!--DATATABLE -->
    <!-- <script src="http://localhost/PROYECTO_ZESARI/DataTables/dataTables.min.js"></script> -->
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/Buttons-2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/Buttons-2.3.6/js/buttons.html5.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/Buttons-2.3.6/js/buttons.print.min.js"></script>
    <script src="http://localhost/PROYECTO_ZESARI/DataTables/Responsive-2.4.1/js/dataTables.responsive.min.js"></script>
    
    
  
    

</body>

</html>