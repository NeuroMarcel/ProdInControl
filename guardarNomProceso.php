<?php
include('conection.php');
$con = conection();

$idProceso = $_POST['id'];
$nuevoNombre = $_POST['nuevo_nombre'];
$max_op = $_POST['max_op'];
$valor_proceso = $_POST['valor_proceso'];
$uni_med = $_POST['uni_med'];


// $sql = "INSERT INTO practica.procesos(nombre_proceso, max_operadores, pzs_hra, medidor) values('$nuevoNombre', $max_op,$valor_proceso,'$uni_med')";
$sql = "UPDATE procesos SET nombre_proceso = '$nuevoNombre', pzs_hra = $valor_proceso, medidor = '$uni_med'  WHERE procesos_id = $idProceso";
$result = mysqli_query($con, $sql);

if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}


mysqli_close($con);