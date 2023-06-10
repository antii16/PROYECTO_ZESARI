<?php
use Models\Clase;

?>
<main>
  <!-- HEADER CONTENIDO -->
  <div class="header-submenu">
    <div class="overlay">
    <h1>Realizar pago</h1>
      </div>
  </div>
    <!-- MAIN CONTENIDO -->
  <div class="main-contenido">
    <div class="crear"> 
        <form id="formularioCrear" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>pagar" method="POST" enctype="multipart/form-data">
          <p>
            <label for="">Cliente</label>
            <input type="text" name="data[id_cliente]" value="<?=$id?>">
          </p>
          <p>
            <label for="">Tipo:</label>
            <select name="data[tipo]" id="">
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="transferencia">Transferencia bancaria</option>
            </select>
          </p>

      <p>
        <label for="">Cantidad: </label>
        <input type="text" name="data[cantidad]" id="cantidad" value="">
      </p>

      <p>
      <label for="">Clase:</label>
      <select name="data[id_clase]" id="claseSeleccionada">
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
      
          <input class="insertarDato" type="submit" name="pagar"  value="Pagar" >
    </form>
    </div>
  </div>

</main>

<script type="text/javascript">

var claseSeleccionada = document.getElementById('claseSeleccionada');
  var detallesClase = document.getElementById('detallesClase');

  claseSeleccionada.addEventListener('change', function() {
    var selectedValue = claseSeleccionada.value;
    // Realizar una solicitud AJAX para obtener los detalles de la clase seleccionada
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualizar el contenido de los detalles de la clase con la respuesta del servidor
        
        var response = JSON.parse(xhr.responseText);
        var precio = response.precio;

        // Actualizar el valor del campo de entrada con el precio
        cantidad.value = precio;

      }
    };
    xhr.open('GET', '<?=$_ENV['base_url']?>obtener_detalles_clase/'+selectedValue, true);
    xhr.send();
  });
</script>