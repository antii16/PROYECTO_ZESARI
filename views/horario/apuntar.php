<?php 
use Utils\Utils;
use Models\Horario;
use Models\Pago;
use Models\Apunte;
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
    <?php 
    
    $id = $datos[0]->id_cliente;
   
    ?>
    
        <form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/apuntar/<?=$id?>" method="POST" enctype="multipart/form-data">
        <?php foreach($datos as $pago):?>
            <?php 
                $cantidad = Horario::cantidadApunte($id, $pago->id_categoria); //tiene que separar por id_cliente y 
                $clases_apuntadas = $pago->n_clases_apuntar - $cantidad->cantidad_horario; // 4 - 0
        
        ?>
       
        <div class="contenedor">
            <div class="caja">
            <p> 
                <label for="id_cliente">Cliente <?=$pago->usuario_nombre?> con id:  </label>
                <input type="text" name="data[id_cliente][]" value="<?=$pago->id_cliente?>" readonly required>
            </p>
        
            <?php $horario = Horario::obtenerHorarioPorCategoria($pago->id_categoria, $pago->id_cliente); ?>
            <?php
                // Crear un array de días de la semana
                $dias_semana = [
                    1 => 'lunes',
                    2 => 'martes',
                    3 => 'miércoles',
                    4 => 'jueves',
                    5 => 'viernes',
                    6 => 'sábado',
                    7 => 'domingo'
                ];
            ?>

            
            <p>
                <label for="categoria">Horario:</label>
                <select name="data[id_horario][]">
                <option value="selecciona">Selecciona un horario</option>  
                    <?php while($hora = $horario->fetch(PDO::FETCH_OBJ)):?>
                       
                        <option value="<?=$hora->id_horario?>"><?=$dias_semana[date('N',strtotime($hora->fecha))].' -> '.$hora->fecha?></option>  
                    <?php endwhile?>
        
                </select>
            </p>
            </div>
        
            <div class="caja clasesUsuario">
                <h3>Clases pagadas</h3>
                <ul>
                    
                    
                    <li><?=$pago->clases_titulo?></li>
                    <li>Falta <?=$clases_apuntadas?></li>
                    <?php $horarios = Horario::clasesUsuario($id,$pago->id_categoria ); ?>
                    <?php while($horarioUsuario = $horarios->fetch(PDO::FETCH_OBJ)):?>
                        <li><a class="desapuntar" href="<?=$_ENV['base_url'] ?>horario/desapuntar/<?=$horarioUsuario->id_apuntado?>">Desapuntar</a><?=$horarioUsuario->fecha?></li>
                     <?php endwhile?>
                     
                </ul>
            </div>
        </div>
       
        <?php endforeach; ?>
        <div class="contenedor">
                <input class="insertarDato" type="submit" value="Apuntar">
                <a class="volver" href="<?=$_ENV['base_url'] ?>usuario/gestion">Volver</a>
        </div>
        </form>
</div>
</div>
</div>

</main>
