<?php
include('conection.php');
$con = conection();

$procesos_id = null;
$nuevoProceso = $_POST['nuevoProceso'];
$max_operadores = $_POST['max_operadores2'];
$pzs_hra = $_POST['pzs_hra'];
$medidor = $_POST['uni_med2'];



$nuevoProceso = mysqli_real_escape_string($con, $_POST['nuevoProceso']);
$response = array();

$sql = "SELECT * FROM practica.procesos WHERE nombre_proceso = '$nuevoProceso'";
$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) > 0) {
    // El proceso ya existe
    $response['success'] = false;
    $response['message'] = 'El proceso ya existe.';
} else {
    // El proceso no existe, puedes proceder con la lógica de inserción u otro proceso
    $sql = "INSERT INTO practica.procesos(nombre_proceso, max_operadores, pzs_hra, medidor) VALUES ('$nuevoProceso', $max_operadores, $pzs_hra, '$medidor')";
    $query = mysqli_query($con, $sql);

    $response['success'] = true;
}


echo json_encode($response, JSON_UNESCAPED_UNICODE);

mysqli_close($con);
