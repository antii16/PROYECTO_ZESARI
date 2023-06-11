<?php
use Models\Clase;
use Models\Horario;
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
      <div class="alertas">
        <?php 
        if(isset($_SESSION['crear_pago']) && $_SESSION['crear_pago']=='complete') {
            echo "<strong>Pago registrado</strong>";
        }

        elseif(isset($_SESSION['crear_pago']) && $_SESSION['crear_pago']=='failed') {
            echo "<strong>Pago no registrado</strong>";
        }

        elseif(isset($_SESSION['crear_pago']) && is_array($_SESSION['crear_pago'])){
            foreach($_SESSION['crear_pago'] as $errores) {
                echo "<p><strong style=color:red;> *".$errores."</strong></p>";
            }
        }

        unset($_SESSION['crear_pago']);
        ?>
      </div>

      <div class="crear"> 
        <form id="formularioCrear" style="margin-left: 30px; margin-top:30px" action="<?=$_ENV['base_url']?>pagar/<?=$id?>" method="POST" enctype="multipart/form-data">
          <div class="contenedor">
            <div class="caja">
              <p>
                <label for="id_cliente">Cliente</label>
                <input type="text" name="data[id_cliente]" value="<?=$id?>">
              </p>
              <p>
                <label for="tipo">Tipo:</label>
                <select name="data[tipo]" id="">
                    <option value="seleccionada">Selecciona</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="transferencia">Transferencia bancaria</option>
                </select>
              </p>
              <p>
                <label for="estado">Estado:</label>
                <select name="data[estado]" id="">
                  <option value="seleccionada">Selecciona</option>
                  <option value="pagado">Pagado</option>
                  <option value="pendiente">Pendiente</option>
                  <option value="reserva">Reserva</option>
                </select>
              </p>

            </div>

            <div class="caja">
              <p>
                <label for="cantidad">Cantidad: </label>
                <input type="text" name="data[cantidad]" id="cantidad" value="">
              </p>

              <p>
                <label for="id_clase">Clase:</label>
                <select name="data[id_clase]" id="claseSeleccionada">
                  <option value="seleccionada">Selecciona una clase</option>    
                  <?php $clases = Clase::obtenerClases(); ?>
                  <?php while($clase = $clases->fetch(PDO::FETCH_OBJ)):?>
                      <option value="<?=$clase->id?>"><?=$clase->titulo?></option>    
                  <?php endwhile?>
                </select>
              </p>
          </div>

          <div class="caja">
            <ul>
              <li></li>
            </ul>
          </div>
        </div>  
        
        <div class="contenedor">
          <input class="insertarDato" type="submit" name="pagar"  value="Pagar">
          <a class="volver" href="<?= $_ENV['base_url'] ?>usuario/gestion">Volver</a>
        </div>     
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