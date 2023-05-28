$(document).ready(function () {
    $('#formularioCliente').hide();
    $('#formularioEmpleado').hide();
    $('#btnCargar').click(function () {
        var valor = $('#seleccionado').val();
        console.log(valor)


        if(valor == 'cliente') {
            $('#formularioEmpleado').hide();
            $('#formularioCliente').show();
        }

        else if(valor == 'empleado') {
            $('#formularioCliente').hide();
            $('#formularioEmpleado').show();
        }
    })

})