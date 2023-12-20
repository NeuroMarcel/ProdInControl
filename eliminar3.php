<?php
include('conection.php');
$con = conection();

$produccion_linea_id = $_POST['produccion_linea_id'];
$produccion_id = $_POST['produccion_id'];
$total_prod = $_POST['total_prod'];
$cuenta = $_POST['cuenta'];

$query = "DELETE FROM produccion_linea WHERE produccion_linea_id = '$produccion_linea_id'";
$result = mysqli_query($con, $query);

if ($cuenta == 0) {
    $query2 = "DELETE FROM produccion WHERE produccion_id = '$produccion_id'";
    $result2 = mysqli_query($con, $query2);
    // header("location: verdata.php");
}
if ($cuenta >= 1) {
    $nuevo_total_operador = $total_prod / $cuenta;

    $query2 = "UPDATE produccion_linea SET total = '$nuevo_total_operador' WHERE produccion_id = '$produccion_id'";
    $result2 = mysqli_query($con, $query2);
}
echo json_encode($cuenta, JSON_UNESCAPED_UNICODE);

// header("location: actualizar_pr.php?id=" . $produccion_id);


// mysqli_close($con);