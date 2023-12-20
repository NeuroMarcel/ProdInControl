<?php
include('conection.php');
$con = conection();
$value = $_POST['value'];
//$cod_proceso = $_POST['codigo_proceso'];  

$query = "SELECT x.* FROM practica.procesos x
WHERE procesos_id = $value ";
$result = mysqli_query($con, $query);


while ($row = mysqli_fetch_array($result)) {
   $output[] = $row;
}
$data["result"] = [
   "data" => $output,
];
echo json_encode($data, JSON_UNESCAPED_UNICODE);


echo json_encode("El numero del listado es: " . $cod_proceso, JSON_PRETTY_PRINT);