<?php
include('conection.php');
$con = conection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = null;
    $produccion_id = $_POST['produccion_id'];
    $fecha = $_POST['fecha'];
    $nombre_proceso = $_POST['nombre_proceso'];
    $cantidad_pzs = $_POST['cantidad_pzs'];
    $total_prod = $_POST['total_prod'];

    // Actualizar los datos en la base de datos
    $query = "UPDATE produccion SET fecha = '$fecha', nombre_proceso = '$nombre_proceso', cantidad_pzs = $cantidad_pzs, total = $total_prod WHERE produccion_id = $produccion_id";

    if (mysqli_query($con, $query)) {
        // Éxito en la actualización
        // Puedes redirigir a la página principal o mostrar un mensaje de éxito
        header("Location: verData.php");
        exit();
    } else {
        // Manejar errores en caso de fallo en la actualización
        echo "Error en la actualización: " . mysqli_error($con);
    }
}