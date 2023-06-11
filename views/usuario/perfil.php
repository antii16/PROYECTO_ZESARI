<main>
    <!-- HEADER CONTENIDO -->
        </q><div class="header-submenu">
        <div class="overlay">
        <h1><?= $_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->
    <div class="main-contenido">
        <div id="verUsuario">
        <div class="caja">
            <div id="imagenVerUsuario">
            <?php if($_SESSION['identity']->imagen != NULL):?>
                <img src="<?= $_ENV['base_url'] ?>src/img/<?=$_SESSION['identity']->imagen?>" alt="">
                <?php else: ?> 
                    <img src="<?= $_ENV['base_url'] ?>src/img/user.png" alt="">
                <?php endif; ?>
            </div>

            <div id="datos">
                <ul>
                    <li><span>Email: </span> <?=$_SESSION['identity']->email?> </li>
                    <li><span>Fecha nacimiento: </span><?=$_SESSION['identity']->fecha_nacimiento?> </li>
                    <li><span>Lugar nacimiento: </span><?=$_SESSION['identity']->lugar_nacimiento?> </li>
                    <li><span>Direccion:</span> <?=$_SESSION['identity']->direccion?> </li>
                    <li><span>Telefono:</span> <?=$_SESSION['identity']->telefono?></li>
                    <li><span>Otro: </span><?=$_SESSION['identity']->telefono2?> </li>
                </ul>
                
            </div>
            <div id="botones">
            <a class="insertarDato" href="<?=$_ENV['base_url']?>usuario/editar">Editar datos</a>
            </div>
            
        </div>
        <div class="caja">
        <h2>Patologías</h2>
        <?php if($_SESSION['identity']->patologias != NULL):?>
            <p><?=$_SESSION['identity']->patologias?></p>

        <?php else: ?> 
            <p>Ninguna</p>
        <?php endif; ?>
        </div>
        </div>
    </div>
</main>

