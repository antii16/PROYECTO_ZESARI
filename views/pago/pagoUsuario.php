<?php
use Models\Clase;

?>
<main>


<div class="crear"> 

<h1>Realizar pago</h1>
<div id="formularioUsuario">
<form  style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>pagar" method="POST" enctype="multipart/form-data">
<p>
    <label for="">Cliente</label>
    <input type="text" name="data[id_cliente]" value="<?=$id?>">
  </p>
<p>
    <label for="">
        <label for="">Tipo:</label>
        <select name="data[tipo]" id="">
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="transferencia">Transferencia bancaria</option>
        </select>
    </label>
  </p>

  <p>
    <label for="">Cantidad: </label>
    <input type="text" name="data[cantidad]">
  </p>

  <p>
  <label for="">Clase:</label>
  <select name="data[id_clase]" id="">
  <?php $clases = Clase::obtenerClases(); ?>
    <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
        <option value="<?=$clase->id?>"><?=$clase->titulo?></option>
           
     <?php endwhile?>

     </select>
  </p>

  <p>
   
        <label for="">Estado:</label>
        <select name="data[estado]" id="">
            <option value="pagado">Pagado</option>
            <option value="pendiente">Pendiente</option>
            <option value="reserva">Reserva</option>
     
    </label>
  </p>
  
        <input type="submit" name="pagar"  value="Registrar pago" class="btn btn-primary">
</form>


</div>


</main>

<?php

var_dump($id);
die();
?>
