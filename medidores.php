<?php

include('conection.php');
$con = conection();

$medidor = $row['medidor'];

$query = "SELECT medidor FROM procesos group BY medidor";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $medidor = $row['medidor'];
};
$data["result"] = [
    "unidades" => $medidor,

];

echo json_encode($data, JSON_UNESCAPED_UNICODE);