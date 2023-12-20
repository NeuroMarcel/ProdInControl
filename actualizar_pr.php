<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Datos Producción en Línea</title>
</head>

<body>
    <br>

    <?php
    include('conection.php');
    $con = conection();

    // Obtener el ID de producción de la URL
    $produccion_id = $_GET['id'];

    // Obtener los datos de producción basados en el ID
    // Esto puede variar según cómo estén organizados tus datos en la base de datos
    $query = "SELECT x.*, w.nombre_proceso, w.pzs_hra,z.total total_individual,o.nombre_operador, z.codigo_operario, z.produccion_linea_id
    FROM practica.produccion x
    LEFT JOIN practica.procesos w ON x.cod_proceso = w.procesos_id 
    LEFT JOIN practica.produccion_linea z ON x.produccion_id = z.produccion_id
    LEFT JOIN practica.operadores o ON o.codigo_operador = z.codigo_operario 
where x.produccion_id = $produccion_id";
    $result = mysqli_query($con, $query);
    // $while = $result;
    $i = 1;


    while ($row = mysqli_fetch_array($result)) {


        if ($i == 1) {
    ?>

    <form class="mt-5 shadow p-5 mb-5 bg-white rounded" action="actualizar.php" method="POST">
        <input type="hidden" class="form-control" id="produccion_id" value="<?php echo $produccion_id; ?>"
            name="produccion_id">
        <table class="table table-bordered border-primary shadow p-3 mb-5 bg-white rounded">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre Proceso</th>
                <th scope="col">Cantidad Pzs</th>
                <th scope="col">Total Producción</th>
                <!-- <!-- <th scope="col">Valor Proceso</th> -->
                <!-- <th scope="col">produccion_linea_id</th>  -->
            </tr>
            <tr>
                <td><input type="date" class="form-control" id="fecha" value="<?php echo $row['fecha']; ?>" name="fecha"
                        placeholder="Fecha"></td>

                <td><input type="text" class="form-control" id="nombre_proceso"
                        value="<?php echo $row['nombre_proceso']; ?>" name="nombre_proceso" placeholder="Nombre Proceso"
                        readonly></td>

                <td><input type="text" class="form-control" id="cantidad_pzs" name="cantidad_pzs"
                        value="<?php echo $row['cantidad_pzs']; ?>" placeholder="Cantidad Pzs"></td>

                <td><input type="number" class="form-control" id="total_prod" name="total_prod"
                        value="<?php echo $row['total']; ?>" placeholder="Total Producción" readonly></td>

                <td><input type="hidden" class="form-control" id="valor_proceso" name="valor_proceso"
                        value="<?php echo $row['pzs_hra']; ?>" placeholder="Total Producción" readonly></td>

                <td><input type="submit" class="btn btn-primary" id="actualizar" name="actualizar" value="Actualizar">
                </td>
            </tr>
        </table>
        <!-- <td><input type="submit" class="btn btn-primary" id="operador" name="operador" value="operador">
        </td> -->
    </form>
    <?php

        }

        if ($i == 1) {
        ?>

    <table class="table table-striped" id="table_operarios">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">total</th>
                <th scope="col">accion</th>
            </tr>
        </thead>
        <tbody>
            <?php

            }

                ?>

            <tr>
                <td><?php echo $row['codigo_operario']; ?></td>
                <td><?php echo $row['nombre_operador']; ?></td>
                <td><?php echo $row['total_individual']; ?></td>
                <td class='text-center'>
                    <input type='hidden' name='produccion_id' value="<?php echo $row['produccion_id']; ?>">
                    <input type='hidden' name='produccion_linea_id' value="<?php echo $row['produccion_linea_id']; ?>">

                    <i class='fas fa-trash borrar red-text fa-xs'></i>
                </td>
            </tr>
            <?php
            $i++;
        }

            ?>
        </tbody>
    </table>


</body>

</html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script>
$("#cantidad_pzs").on('keydown', function(e) {

    var code = e.keyCode || e.which;
    if (code == 13) {

        calcularTotal();

        e.preventDefault();
    }

});



$('#table_operarios').on('click', 'i.borrar', function(e) {

    var produccion_linea_id = $(this).closest('tr').find('input[name=produccion_linea_id]').val();
    var produccion_id = $(this).closest('tr').find('input[name=produccion_id]').val();



    Swal.fire({
        title: "Are you sure?",
        text: "Seguro que quieres borrar esta tabla?!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"

    }).

    then((result) => {
        if (result.isConfirmed) {
            $(this).closest('tr').remove();
            eliminar_operario(produccion_linea_id, produccion_id);
        }

    })



});


function eliminar_operario(produccion_linea_id, produccion_id) {
    var w = cuenta_Tabla();
    console.log(w);
    $.ajax({
        url: "eliminar3.php",
        data: {
            "produccion_linea_id": produccion_linea_id,
            "produccion_id": produccion_id,
            "total_prod": $("#total_prod").val(),
            "cuenta": $("#table_operarios tbody tr").length,

        },
        type: "POST",
        dataType: "json",
        async: false,
        success: function(response) {
            Toastify({

                text: "This is a toast",

                duration: 13000

            }).showToast();
            calcularTotal();
            if (response == 0) {
                window.location.href = "verdata.php";
            }
        },
        error: function(error) {}
    });
}

function cuenta_Tabla() {

    var x = $("#table_operarios tbody tr").length;
    return x;

}

function calcularTotal() {

    var valorProceso = $("#valor_proceso").val();
    var cantidadPzs = $("#cantidad_pzs").val();
    var total_prod = $("#total_prod").val();
    var hra = 142.2;

    var valor_total_proceso = (valorProceso * cantidadPzs) / hra;
    $("#total_prod").val(valor_total_proceso.toFixed(2));

}
</script>