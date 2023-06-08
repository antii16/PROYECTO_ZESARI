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
tabla += "<th>8:00 - 9:00</th>";
tabla += "<th>9:00 - 10:00</th>";
tabla += "<th>10:00 - 11:0</th>";
tabla += "<th>11:00 - 12:00</th>";
tabla += "<th>12:00 - 13:00</th>";
tabla += "<th>13:00 - 14:00</th>";
tabla += "<th>14:00 - 15:00</th>";
tabla += "<th>15:00 - 16:00</th>";
tabla += "<th>16:00 - 17:00</th>";
tabla += "<th>17:00 - 18:00</th>";
tabla += "<th>18:00 - 19:00</th>";
tabla += "<th>19:00 - 20:00</th>";
tabla += "<th>20:00 - 21:00</th>";
tabla += "<th>21:00 - 22:00</th>";
tabla += "</thead>";

tabla += "<tbody>";
for (var dia = 1; dia <= diasMes; dia++) {
  // Ojo, hay que restarle 1 para obtener el mes correcto
    var indice = new Date(year, mes, dia).getDay();

    tabla += "<tr>";
    tabla += `<td>${diasSemana[indice]} ${dia}</td>`; //rellenar con clases
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;
    tabla += `<td></td>`;

    tabla += "</tr>";
  console.log(`El día número ${dia} del mes ${mes} del año ${year} es ${diasSemana[indice]}`);
}

tabla += "</tbody>";
tabla += "</table>";

const tablaHorario = document.getElementById("tablaHorario");

tablaHorario.innerHTML += tabla;

// document.write(tabla);
</script>