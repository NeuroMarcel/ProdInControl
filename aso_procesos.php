<?php

include('conection.php');
$con = conection();



$value = $_POST['value'];

//$value2 = $_POST['value2'];

$query = "SELECT pzs_hra, max_operadores, medidor,nombre_proceso FROM procesos where procesos_id = $value ";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $hra = $row['pzs_hra'];
    $max_operadores = $row['max_operadores'];
    $medidor = $row['medidor'];
    $nombre_proceso = $row['nombre_proceso'];
};
$data["result"] = [
    "hra" => $hra,
    "max_operadores" => $max_operadores,
    "unidades" => $medidor,
    "nombre_proceso" => $nombre_proceso,


];

echo json_encode($data, JSON_UNESCAPED_UNICODE);