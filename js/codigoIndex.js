
//-----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
//--------------------------------Calendario-----------------------------------
$(() => {
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
$(() => {
    $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});




//--------------------------MAQUINA-FUNCION CAMBIO-----------------------------
$("#maquina").on('change', function() {

    var parametros = {
        "value": $(this).val(),
        "value2": $(this).val(),
    }

    Carga_proceso(parametros); //----LLAMANDO A LA FUNCION----
});
//--------------FUNCION AJAX HACIA BASE DE DATOS TABLA PROCESOS-----------------
function Carga_proceso(parametros) {
    $.ajax({
        url: "procesos.php",
        type: 'POST',
        data: parametros,
        dataType: 'json',
        cache: false,
        success: function(response) {
            $('#procesos', ).empty();
            // $('#nombre_proceso', ).empty();


            $('<option selected disabled>').val('').text('.::Proceso::.').appendTo('#procesos');
            // $('<option selected disabled>').val('').text('.::Proceso::.').appendTo('#nom_proceso');

            $.each(response.result['data'], function(k, v) {
                $('<option>').val(v.procesos_id).text(v.nombre_proceso).appendTo('#procesos');

                // $('<option>').val(v.nombre_proceso).text(v.nombre_proceso).appendTo(
                //     '#nombre_proceso')
            });
        },
        error: function() {

        },
        async: false,
    });
};

//--------------------------PROCESOS-FUNCION-CAMBIO-----------------------------------------------
$("#procesos").on('change', function() {
    if ($("#maquina").val() === null) {
        alert("¡Primero debe seleccionar una maquina!");

        return;
    }
    if (procesos === '') {
        alert("selecciona un proceso antes de continuar")
        return false;
    }

    var x = $(this).val();
    var y = $(this).find("option:selected").text();


    var parametros = {
        "value": $(this).val(),
        "value2": y,
    }

    $.ajax({
        url: "aso_procesos.php",
        type: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(response) {



            var hra = response.result['hra'];
            var max_operadores = response.result['max_operadores'];
            var unidades = response.result['unidades'];
            var nombre_proceso = response.result['nombre_proceso'];
            var produccion_linea_id = response.result['produccion_linea_id'];



            $("#valor_proceso").val(hra);
            $("#uni_med").val(unidades);
            $("#nombre_proceso").val(nombre_proceso);
            $("#produccion_linea_id").val(produccion_linea_id);

            agregarOperadores(max_operadores);



        },
        error: function() {}
    });
});

$("#proceso").on("change", function(e) {

    var x = $(this).val();
    var y = $(this).find("option:selected").text();



});

//---------------------------------------------------------------------------------------

function agregarOperadores(cantidadOperadores) {
    // var cantidadOperadores = document.getElementById("cantidadOperadores").value;
    var contenedorOperadores = document.getElementById("contenedorOperadores");

    // Eliminar operadores previos
    while (contenedorOperadores.firstChild) {
        contenedorOperadores.removeChild(contenedorOperadores.firstChild);
    }

    // Agregar los nuevos operadores
    for (var i = 1; i <= cantidadOperadores; i++) {
        var row = document.createElement("div");
        row.className = "row";
        row.innerHTML = `
            <div class="col-md-4">
                <p>Codigo Operador</p>
                <input type="text" class="form-control" name="cod_operador${i}" id="cod_operador${i}" placeholder="" value=""  onkeydown="validarCodigoOperador(event, ${i})">
            </div>
            <div class="col-md-4">
                <p>Nombre operador</p>
                <input type="text" class="form-control" name="nombre_operador${i}" id="nombre_operador${i}" placeholder="" value=""   disabled readonly>
            </div>
            <div class="col-md-4">
                <p>Total Operador</p>
                <input type="number" class="form-control" name="total_operador${i}" id="total_operador${i}" placeholder="Total operador"  disabled readonly>
            </div>
        `;
        contenedorOperadores.appendChild(row);
    }
}


function validarCodigoOperador(e, numOperador) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        var x = $("#cod_operador" + numOperador).val();
        var parametros = {
            "codigo_operador": x,
            "numOperador": numOperador,
        }
        Carga_operador(parametros); // Llamada a la función Carga_operador
        e.preventDefault();
    }
}

function Carga_operador(parametros) {
    $.ajax({
        url: "nombre_operador.php",
        type: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(response) {
            if (response.result && response.result.data) {
                // Verificar si la respuesta contiene datos válidos
                var nombreOperador = response.result.data.nombre;

                // Manipular el nombre del operador según tus necesidades
                $("#nombre_operador" + parametros["numOperador"]).val(nombreOperador);
            } else {
                // Manejar el caso en el que no se encuentra el operador
                console.error("Operador no encontrado");
            }
        },
        error: function() {
            // Manejar errores de la solicitud AJAX
            console.error("Error en la solicitud AJAX");
        }
    });
}

$("#Agregar_produccion").on('click', function(e) {
    var y = validarFolio();
    var p = validarPzs();
    var x = validarCampos();

    if (!y) {
        e.preventDefault();
    }
    if (!p) {
        e.preventDefault();
    }
    if (!x) {
        e.preventDefault();
    }




});
//-------------------------------------------------------------------------------
$("#cantidad_pzs").on('keydown', function(e) {
    if (e.key === "Enter") {
        calcularTotal();
        calcularTotal2();
        e.preventDefault();
    }
});

function calcularTotal() {
    var valorProceso = $("#valor_proceso").val();
    var cantidadPzs = $("#cantidad_pzs").val();
    var hra = 142.2;
    var valor_total_proceso = (valorProceso * cantidadPzs) / hra;
    $("#total_proceso").val(valor_total_proceso.toFixed(2));
}


function calcularTotal2() {
    // Obtener los valores de los campos de entrada
    var valorProceso2 = parseFloat($("#valor_proceso").val()) || 0;
    var cantidadPzs2 = parseFloat($("#cantidad_pzs").val()) || 0;
    var hra2 = 142.2;

    var op1 = $.trim($("#cod_operador1").val());
    var op2 = $.trim($("#cod_operador2").val());
    var op3 = $.trim($("#cod_operador3").val());
    var i = 0;


    if (op1 != "") i++;
    if (op2 != "") i++;
    if (op3 != "") i++;


    // Realizar la multiplicación
    var valor_total_proceso2 = ((valorProceso2 * cantidadPzs2) / (hra2 * i)).toFixed(2);
    console.log(i);
    if (op1 != "") $("#total_operador1").val(valor_total_proceso2);

    if (op2 != "") $("#total_operador2").val(valor_total_proceso2);

    if (op3 != "") $("#total_operador3").val(valor_total_proceso2);

    // Asignar el mismo resultado a ambas casillas

}

$("#nombre_operador1").on('keydown', function(e) {
    if (e.key === "Enter") {
        calcularTotal();
        calcularTotal2();
        e.preventDefault();
    }

    function Total_operador() {
        var tOP = $("#total_proceso").val();

        var totalOperador = parseFloat(tOP / 1).toFixed(2);
        $("#total_operador").val(totalOperador);


    }

});


$("#nombre_operador2").on('keydown', function(e) {
    if (e.key === "Enter") {
        calcularTotal();
        calcularTotal2();
        e.preventDefault();
    }

    function Total_operador() {
        var tOP = $("#total_proceso").val();

        var totalOperador = parseFloat(tOP / 2).toFixed(2);
        $("#total_operador2").val(totalOperador);


    }
});
$("#nombre_operador3").on('keydown', function(e) {
    if (e.key === "Enter") {
        calcularTotal();
        calcularTotal2();
        e.preventDefault();
    }

    function Total_operador() {
        var tOP = $("#total_proceso").val();

        var totalOperador = parseFloat(tOP / 3).toFixed(2);
        $("#total_operador3").val(totalOperador);


    }
});


//--------------------------------------------------------------------------------
function validarFolio() {

    var folio = $('#folio_produccion').val();
    console.log(folio);

    if (folio == '') {
        alert('Folio está vacío');
        return false;
    }
    return true;
}
//--------------------------------------------------------------------------------
function validarPzs() {

    var cantidad_pzs = $('#cantidad_pzs').val();
    console.log(cantidad_pzs);

    if (cantidad_pzs == '') {
        alert('ingrese cantidad de piezas');
        return false;
    }
    return true;
}
//-------------------------------------------------------------------------------

function validarCampos() {

    var cod_operador1 = $("#cod_operador1").val();
    var cod_operador2 = $("#cod_operador2").val();
    var cod_operador3 = $("#cod_operador3").val();

    if (cod_operador1 === '' && cod_operador2 === '' && cod_operador3 === '') {
        alert('ingresa un codigo de operador');
        return false;
    }
    return true;

}

function validar_Datos_produccion_id() {
    var datos_produccion_id = $("#datos_produccion_id").val();
    if (datos_produccion_id == '') {
        alert("Ingrese producción");
    }
}


//-------------------------------------------------------------------------------
