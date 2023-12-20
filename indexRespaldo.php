<?php
include('conection.php');
$con = conection();
$sql = "SELECT * FROM datos_cliente";
$query = mysqli_query($con, $sql);
$sql2 = "SELECT * FROM datos_produccion";
$query2 = mysqli_query($con, $sql2);
$sql3 = "SELECT * FROM produccion_linea";
$query3 = mysqli_query($con, $sql3);
$sql4 = "SELECT * FROM procesos";
$query4 = mysqli_query ($con,$sql4);
$sql5 = "SELECT * FROM maquina";
$query5 = mysqli_query ($con,$sql5);
$sql6 = "SELECT * FROM proceso_maquina_fk";
$query6 = mysqli_query ($con,$sql6);
$sql_lista_operadores = "SELECT * FROM operadores";
$query_lista_operadores = mysqli_query ($con,$sql_lista_operadores);
$sql_nombre_operador = "SELECT * FROM operadores";
$query_nombre_operador = mysqli_query ($con,$sql_nombre_operador);



if (!$query) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Datos Producción en Línea</title>
</head>

<body>
<div class="container">
        <h1 class="my-5">Datos Cliente</h1>
        <div class="card bg-success">
            <div class="card-body">
                <form action="insert_cliente.php" method="POST">
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <label for="pk_produccion_id" class="form-label">ID Produccion</label>
                            <input type="text" class="form-control" id="pk_produccion_id" name="pk_produccion_id" placeholder="ID Produccion">
                        </div> -->
                        <!-- <div class="col-md-6">
                            <label for="id_cliente" class="form-label">ID Cliente</label>
                            <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="ID Cliente">
                        </div> -->
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="Nombre_cliente" class="form-label">Nombre Cliente</label>
                        <input type="text" class="form-control" id="Nombre_cliente" name="Nombre_cliente" placeholder="Nombre Cliente">
                        
                    </div>
                    <div class="col-md-6">
                    <label for="id_pedido" class="form-label">ID Pedido</label>
                        <input type="text" class="form-control" id="id_pedido" name="id_pedido" placeholder="ID Pedido">
                    </div>
                    <div class="md-6">
                        
                        <label for="Direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                </form>
            </div>
        </div> 
        <!-- <div class="row"></div> -->
        <h1 class="my-5">Datos Produccion</h1>
        <div class="card bg-secondary">
        <div class="card-body">
        <form action="insert_produccion.php" method="POST">
            <div class="row">
                <div class="col-md-5">
                    <label for="datos_produccion_id" class="form-label">ID Produccion</label>
                    <input type="text" class="form-control" id="datos_produccion_id" name="datos_produccion_id" placeholder="ID Produccion">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-5">
                    <label for="folio" class="form-label">Folio</label>
                    <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for="op" class="form-label">OP</label>
                    <input type="text" class="form-control" id="op" name="op" placeholder="OP">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for="item" class="form-label">Item</label>
                    <input type="text" class="form-control" id="item" name="item" placeholder="Item">
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label for="nombre_pedido" class="form-label">Nombre Pedido</label>
                    <input type="text" class="form-control" id="nombre_pedido" name="nombre_pedido" placeholder="Nombre Pedido">
                </div>
            </div> 
            <div class="row">
                <div class="col-md-5">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Produccion</button>
        </form>
        </div>
        </div>  
    

<div class="container mt-5">
    <h1>Datos Producción en Línea</h1>
    <br>
    <div class="card bg-info">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="mb-3">
                        <label for="folio_produccion" class="form-label">Folio de Producción</label>
                        <input type="number" class="form-control" id="folio_produccion" placeholder="Ingrese folio">
                    </div>

                <div class="mb-3">
                    <label for="maquina" class="form-label">Máquina</label>
                    <select class="form-select" id="maquina" name="maquina">
                        <option value="" disabled selected></option>
                        <?php
                        while ($row = mysqli_fetch_array($query5)) {
                            echo "<option value=" . $row['maquina_id'] . ">" . $row['nombre_maquina'] . "</option>";
                        };
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="procesos" class="form-label">Procesos</label>
                    <select class="form-select" id="procesos" name="procesos">
                        <?php
                        while ($row = mysqli_fetch_array($query4)) {
                            echo "<option value=" . $row['procesos_id'] . ">" . $row['nombre_proceso'] . "</option>";
                        };
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="valor_proceso" class="form-label">Valor Proceso</label>
                    <input type="number" class="form-control" id="valor_proceso" placeholder="Valor Proceso" readonly>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="Total Proceso" class="form-label">Cantidad realizada</label>
                        <input type="number" class="form-control" id="cantidad_pzs" placeholder="ingrese cantidad realizada" >
                    </div>
                    
                    <div class="col-md-6">
                        <label for="valor_proceso" class="form-label">Valor Total Procesado</label>
                        <input type="number" class="form-control" id="total_proceso" placeholder="Total Proceso" readonly>
                    </div>
                    

                    <!-- <div class="col-md-4">
                        <label for="valor_proceso" class="form-label">total operador</label>
                        <input type="number" class="form-control" id="total_operador" placeholder="Total operador" readonly>
                    </div> -->
                </div>

                
                
            <!-- <div class="row">
                    
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Codigo operador</label>
                    <input type="text" class="form-control" id="cod_operador1" placeholder="" value="" required="">
                    
                    </div>
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Nombre operador</label>
                    <input type="text" class="form-control" id="nombre_operador1" placeholder="" value="" required=""readonly>
                    
                    </div>
                    <div class="col-md-4">
                        <label for="valor_proceso" class="form-label">total operador</label>
                        <input type="number" class="form-control" id="total_operador" placeholder="Total operador" readonly>
                    </div>
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Codigo operador</label>
                    <input type="text" class="form-control" id="cod_operador2" placeholder="" value="" required="">
                    
                    </div>
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Nombre operador</label>
                    <input type="text" class="form-control" id="nombre_operador2" placeholder="" value="" required=""readonly>
                    
                    </div>
                    <div class="col-md-4">
                        <label for="valor_proceso" class="form-label">total operador</label>
                        <input type="number" class="form-control" id="total_operador2" placeholder="Total operador" readonly>
                    </div>
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Codigo operador</label>
                    <input type="text" class="form-control" id="cod_operador3" placeholder="" value="" required="">
                    
                    </div>
                    <div class="col-md-4">
                    <label for="firstName" class="form-label">Nombre operador</label>
                    <input type="text" class="form-control" id="nombre_operador3" placeholder="" value="" required=""readonly>
                    
                    </div>
                    <div class="col-md-4">
                        <label for="valor_proceso" class="form-label">total operador</label>
                        <input type="number" class="form-control" id="total_operador3" placeholder="Total operador" readonly>
                    </div> -->

                        <div class="row">
                        <div class="col-md-4">
                            <label for="cantidadOperadores" class="form-label">Cantidad de operadores</label>
                            <input type="number" class="form-control" id="cantidadOperadores" placeholder="Cantidad de operadores" onchange="agregarOperadores()" required="">
                        </div>
                        </div>
                        <div id="contenedorOperadores"></div>
                                            



            </div>
                <hr class="my-4">

                <!-- Similar adjustments for the remaining form fields -->
                <div class="row">
                <div class="col-md-6">

                <button type="submit" class="btn btn-primary" id="Agregar_produccion">Agregar Producción</button>
                </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function agregarOperadores() {
    var cantidadOperadores = document.getElementById("cantidadOperadores").value;
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
                <label for="firstName" class="form-label">Codigo operador</label>
                <input type="text" class="form-control" id="cod_operador${i}" placeholder="" value="" required="">
            </div>
            <div class="col-md-4">
                <label for="firstName" class="form-label">Nombre operador</label>
                <input type="text" class="form-control" id="nombre_operador${i}" placeholder="" value="" required="" readonly>
            </div>
            <div class="col-md-4">
                <label for="valor_proceso" class="form-label">total operador</label>
                <input type="number" class="form-control" id="total_operador${i}" placeholder="Total operador" readonly>
            </div>
        `;
        contenedorOperadores.appendChild(row);
    }
}

$("#maquina").on('change', function() {

    var parametros = {
        "value": $(this).val(),
        "value2": $(this).val(),
    }

    Carga_proceso(parametros);
})

function Carga_proceso(parametros) {
    $.ajax({
        url: "procesos.php",
        type: 'POST',
        data: parametros,
        dataType: 'json',
        cache: false,
        success: function(response) {
            $('#procesos').empty();
            $('<option selected disabled>').val('').text('.::Proceso::.').appendTo('#procesos');
            $.each(response.result['data'], function(k, v) {
                $('<option>').val(v.procesos_id).text(v.nombre_proceso).appendTo('#procesos');
            });
        },
        error: function() {

        },
        async: false,
    });
}
$("#procesos").on('change', function() {
    if ($("#maquina").val() === null) {
        alert("¡Primero debe seleccionar una maquina!");

        return;
    }
    if(procesos === ''){
        alert("selecciona un proceso antes de continuar")
        return false;
    }

    var x = $(this).val();
    var y = $(this).find("option:selected").text();


    var parametros = {
        "value":$(this).val(),
        "value2": y,
    }

    $.ajax({
        url: "aso_procesos.php",
        type: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(response) {
           $("#valor_proceso").val(response)

        },
        error: function() {}
    });
});









//-------------------------------------------------------------------------------


$("#cod_operador1,#cod_operador2,#cod_operador3").on('keydown', function(e) {
    // if ($(this).val()==''){
    //     alert("Debes ingresar un codigo de operador");
    // }
    var code = e.keyCode || e.which;
    if (code == 9 ) {
    

    //esta es la tecla "enter"
    var str = $(this).attr('id');
     const last = str.split('_').slice(-1)[0]
  
    var x = $(this).val();
    
    // var y = $(this).find("option:selected").text();
    var parametros = {
        "codigo_operador": x,
        "last": last,
        
    }
    console.log(last);
    
    Carga_operador(parametros); // Llamada a la función Carga_operador
    e.preventDefault();//nota: esta funcion evita que se ejecute el boton al ingresar text en el input
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
                 $("#nombre_"+parametros["last"]).val(nombreOperador);
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
});

//-------------------------------------------------------------------------------
$("#cantidad_pzs").on('keydown',function(e){
    var code = e.keyCode || e.which;
    if (code == 9 ){
        calcularTotal();
       
    }
    function calcularTotal() {
      // Obtener los valores de los campos de entrada
      var valorProceso = $("#valor_proceso").val();
      var cantidadPzs = $("#cantidad_pzs").val();
      var hra = 142.2;

      // Realizar la multiplicación
      var val_tot_procesado = parseFloat((valorProceso *cantidadPzs)/hra).toFixed(2);
      $("#total_proceso").val(val_tot_procesado);
  
      
}


});
// function produccionOp(){
//     var op1 = $("#nombre_operador1").val();
//     var op2 = $("#nombre_operador2").val();
//     var op3 = $("#nombre_operador3").val();
//     var tOperador = $("#total_operador").val();

//     if(op2 == '' && op3==''){
//         tOperador/1;
        

//     }
// }
// function produccionOp(operador, totalOperador){
//     if($("#nombre_operador2").val() == '' && $("#nombre_operador3").val()){
//         totalOperador/1;
        

//     } else if(operador3 == '' && operador1 != '' && operador2 != ''){
//         totalOperador/2;
        

//     } else if(operador1 != '' && operador2 != '' && operador3 != ''){
//         totalOperador/3;
        

//     }
// }

$("#cod_operador${i}").on('keydown',function(e){
    var code = e.keyCode || e.which;
    if (code == 9 ){
        Total_operador();
       
    }
    function Total_operador(){
        var tOP =$("#total_proceso").val();

        var totalOperador = parseFloat(tOP /1).toFixed(2);
        $("#total_operador").val(totalOperador);


     }
 });
 //$("#nombre_operador2").on('keydown',function(e){
//     var code = e.keyCode || e.which;
//     if (code == 9 ){
//         Total_operador();
       
//     }
//     function Total_operador(){
//         var tOP =$("#total_proceso").val();

//         var totalOperador = parseFloat(tOP /2).toFixed(2);
//         $("#total_operador2").val(totalOperador);


//      }
// });$("#nombre_operador3").on('keydown',function(e){
//     var code = e.keyCode || e.which;
//     if (code == 9 ){
//         Total_operador();
       
//     }
//     function Total_operador(){
//         var tOP =$("#total_proceso").val();

//         var totalOperador = parseFloat(tOP /3).toFixed(2);
//         $("#total_operador3").val(totalOperador);


//      }
// });
    
  
//-------------------------------------------------------------------------------



$("#Agregar_produccion").on('click', function(e) {
    var y = validarFolio();
    var p = validarPzs();
    var x = validarCampos();
    
    if(!y){
        e.preventDefault();        
    }
    if(!p){
        e.preventDefault();
    }

    
   if (!x){    
        e.preventDefault();
    }
    
   


});
//--------------------------------------------------------------------------------
function validarFolio(){

var folio = $('#folio_produccion').val();
console.log(folio);

if(folio == ''){
    alert('Folio está vacío');
    return false;
}return true;
}
//--------------------------------------------------------------------------------
function validarPzs(){

var folio = $('#cantidad_pzs').val();
console.log(folio);

if(folio == ''){
    alert('ingrese cantidad de piezas');
    return false;
}return true;
}
//-------------------------------------------------------------------------------

function validarCampos() {

var cod_operador1 = $("#cod_operador1").val();
var cod_operador2 = $("#cod_operador2").val();
var cod_operador3 = $("#cod_operador3").val();

if (cod_operador1 === '' && cod_operador2 === '' && cod_operador3 === '') {
    alert('ingresa un codigo de operador');
    return false;    
}return true;

}


//-------------------------------------------------------------------------------




</script>

