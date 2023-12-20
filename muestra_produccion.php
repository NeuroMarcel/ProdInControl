<?php
include('conection.php');
$con = conection();


//$cod_proceso = $_POST['codigo_proceso'];  

$query = "SELECT *  FROM practica.produccion x

left join practica.procesos w on w.procesos_id = x.cod_proceso";
$result = mysqli_query($con, $query);


while ($row = mysqli_fetch_array($result)) {
    $output[] = $row;
}
$data["result"] = [
    "data" => $output,
];
echo json_encode($data, JSON_UNESCAPED_UNICODE);