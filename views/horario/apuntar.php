<?php 
use Utils\Utils;
use Models\Horario;
?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Apuntar cliente</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['apuntar']) && $_SESSION['apuntar']=='complete') {
    echo "<strong>Cliente apuntado</strong>";
}

elseif(isset($_SESSION['apuntar']) && $_SESSION['apuntar']=='failed') {
    echo "<strong>Cliente no apuntado</strong>";
}

elseif(isset($_SESSION['apuntar']) && is_array($_SESSION['apuntar'])){
    foreach($_SESSION['apuntar'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['apuntar']);
?>
</div>
<div class="crear"> 

<?php while($pago = $datos->fetch(PDO::FETCH_OBJ)):?>
<form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/apuntar/<?=$pago->id_cliente?>" method="POST" enctype="multipart/form-data">
<div class="contenedor">
    <div class="caja">
    <p> 
        <label for="id_cliente">Cliente <?=$pago->usuario_nombre?> con id:  </label>
        <input type="text" name="data[id_cliente]" value="<?=$pago->id_cliente?>" required>
    </p>

    <?php $horario = Horario::obtenerHorarioPorCategoria($pago->id_categoria); ?>
    <p>
        <label for="categoria">Horario:</label>
        <select name="data[id_horario]">
        <option value="selecciona">Selecciona un horario</option>  
            <?php while($hora = $horario->fetch(PDO::FETCH_OBJ)):?>
                <option value="<?=$hora->id?>"><?=$hora->fecha?></option>  
            <?php endwhile?>

        </select>
    </p>
    </div>

    <div class="caja clasesUsuario">
        <h3>Clases pagadas</h3>
        <ul>
            <li><?=$pago->clases_titulo?></li>
        </ul>
    </div>
</div>
    <div class="contenedor">
        <input class="insertarDato" type="submit"  name="data[apuntar]" value="Apuntar">
        <a class="volver" href="<?= $_ENV['base_url'] ?>usuario/gestion">Volver</a>
</div>

        
</form>

<?php endwhile; ?>
</div>
</div>

</main>
