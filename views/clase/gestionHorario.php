<main>
<div class="main-contenido">
    <h1>Horario</h1>
    <div class="crud">
        <div id="tablaHorario"></div>
    </div>
</div>
<main>

<script type="text/JavaScript">

var myDate = new Date();
var year = myDate.getFullYear();
var mes = myDate.getMonth();
var diasMes = new Date(year, mes, 0).getDate();
var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];


var tabla = "";
tabla += "<table id='horario' style='width:100%'>";

tabla += "<thead>";
tabla += "<tr>";
tabla += "<th>Dias\/Hora</th>";
for (var hora = 8; hora <= 21; hora++) {
    var horaInicio = hora.toString().padStart(2, '0');
    var horaFin = (hora + 1).toString().padStart(2, '0');
    tabla += `<th>${horaInicio}:00 - ${horaFin}:00</th>`;
}
tabla += "</tr>";
tabla += "</thead>";


tabla += "<tbody>";

for (var dia = 1; dia <= diasMes; dia++) {
  // Ojo, hay que restarle 1 para obtener el mes correcto
    var indice = new Date(year, mes, dia).getDay();
    tabla += "<tr>";
    tabla += `<td>${diasSemana[indice]} ${dia}</td>`; //rellenar con clases
    for (var i = 0; i < 14; i++) {
        var horaInicio = (i + 8).toString().padStart(2, '0');
        var horaFin = (i + 9).toString().padStart(2, '0');
        tabla += `<td><a href="${getUrl(dia, horaInicio, horaFin)}">Crear</a></td>`;
    }

    tabla += "</tr>";
  //console.log(`El día número ${dia} del mes ${mes} del año ${year} es ${diasSemana[indice]}`);
}

tabla += "</tbody>";

tabla += "</table>";

const tablaHorario = document.getElementById("tablaHorario");

tablaHorario.innerHTML += tabla;

        function editCell(cell) {
            var data = prompt("Ingrese los datos:");
            if (data !== null) {
                cell.innerText = data;
            }
        }


function getUrl(dia, hora) {
    var envValue = "<?php echo $_ENV['base_url']; ?>";
    var url = envValue + `clase/crear/${dia}/${horaInicio}/${horaFin}`;
    return url;
}
</script>


