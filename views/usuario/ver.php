<main>
    <div class="main-contenido">
    <?php while($dato = $datos->fetch(PDO::FETCH_OBJ)):?>
        <h1><?=$dato->nombre?> <?=$dato->apellidos?></h1>
        <div id="verUsuario">
        <div class="caja">
            <div id="imagenVerUsuario">
            <?php if($dato->imagen != NULL):?>
                <img src="<?= $_ENV['base_url'] ?>src/img/<?=$dato->imagen?>" alt="">
                <?php else: ?> 
                    <img src="<?= $_ENV['base_url'] ?>src/img/user.png" alt="">
                <?php endif; ?>
            </div>

            <div id="datos">
                <ul>
                    <li><span>Email: </span> <?=$dato->email?> </li>
                    <li><span>Fecha nacimiento: </span><?=$dato->fecha_nacimiento?> </li>
                    <li><span>Lugar nacimiento: </span><?=$dato->lugar_nacimiento?> </li>
                    <li><span>Direccion:</span> <?=$dato->direccion?> </li>
                    <li><span>Telefono:</span> <?=$dato->telefono?></li>
                    <li><span>Otro: </span><?=$dato->telefono2?> </li>
                </ul>
                
            </div>
            <div id="botones">
                <a class="borrar" href="<?= $_ENV['base_url'] ?>usuario/borrar/<?= $dato->id?>">Borrar</a>
                <a class="volver" href="<?= $_ENV['base_url'] ?>usuario/gestion">Volver</a>
            </div>
            
        </div>
        <div class="caja">
        <h2>Patologías</h2>
        <?php if($dato->patologias != NULL):?>
            <p><?=$dato->patologias?></p>

        <?php else: ?> 
            <p>Ninguna</p>
        <?php endif; ?>
        </div>
    
      
  
   
        </div>
        <?php endwhile?>
   
    </div>
</main>







