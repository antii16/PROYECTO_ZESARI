<?php 
use Utils\Utils;
use Models\Categoria;
?>

<main>
<!-- HEADER CONTENIDO -->
<div class="header-submenu">
        <div class="overlay">
        <h1>Crear Horario</h1>
        </div>
    </div>
     <!-- MAIN CONTENIDO -->

     
<div class="main-contenido">
<div class="alertas">
<?php 
if(isset($_SESSION['crear_horario']) && $_SESSION['crear_horario']=='complete') {
    echo "<strong>Horario creado</strong>";
}

elseif(isset($_SESSION['crear_horario']) && $_SESSION['crear_horario']=='failed') {
    echo "<strong>Horario no creado</strong>";
}

elseif(isset($_SESSION['crear_horario']) && is_array($_SESSION['crear_horario'])){
    foreach($_SESSION['crear_horario'] as $errores) {
        echo "<p><strong style=color:red;> *".$errores."</strong></p>";
    }
}

unset($_SESSION['crear_horario']);
?>
    </div>
        <div class="crear"> 
            <form id="formularioCrear" action="<?=$_ENV['base_url']?>horario/crear" method="POST" enctype="multipart/form-data">
                <label for="mes">Selecciona un mes:</label>
                <select id="mes">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>

                <table border="1" id="horario"></table>   

                <div class="contenedor">
                        <input class="insertarDato" type="submit" name="crear" value="Crear">
                        <a class="volver" href="<?= $_ENV['base_url'] ?>horario/gestion">Volver</a>
                </div> 
            </form>
        </div>
    </div>
</main>


<script type="text/javascript">
       var mes = document.getElementById('mes');
       var tabla = document.getElementById('horario');

       mes.addEventListener('change', function() {
            var mes_seleccionado = mes.value;
            var fechaActual = new Date();
            var ano = 2024;
            // var ano = fechaActual.getFullYear();
            // Calcular el primer día del mes seleccionado
            var primerDia = new Date(ano, mes_seleccionado - 1, 1);

            // Calcular el último día del mes seleccionado
            var ultimoDia = new Date(ano, mes_seleccionado, 0);

            // Obtener el número de días en el mes seleccionado
            var numDays = new Date(ano, mes_seleccionado, 0).getDate();
            // Obtener la información sobre el primer día de la semana del mes seleccionado
            var firstDayOfWeek = new Date(ano, mes_seleccionado - 1, 1).getDay();
            // console.log(selectedValue);
            var dayCounter = 1;
            var horario = '';
            horario += '<tr><th>Fecha y hora</th><th>Categoría</th><th>Aforo disponible</th></tr>';
            while(dayCounter <= numDays) {
                for(hora = 8; hora <= 21; hora++){
                    horario += '<tr><td>';
                    // Suponiendo que ya tienes las variables año, mes, dayCounter y hora
                    var fechaFormateada = `${ano}-${(mes_seleccionado + '').padStart(2, '0')}-${(dayCounter + '').padStart(2, '0')} ${hora}:00:00`;

                    horario += `<input type="text" name="data[fecha][]" value="${fechaFormateada}" required></td>`;
                    horario += '<td><input type="text" name="data[id_categoria][]" value="13" required></td> ';
                    horario += '<td><input type="text" name="data[aforo_disponible][]" value="6"></td>'
                    
                    horario += '</tr>';
                }

                dayCounter++;
                firstDayOfWeek = 0;
            }
                
            tabla.innerHTML = horario;
            
        });
</script>
