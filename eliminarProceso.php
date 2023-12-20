<?php
include('conection.php');
$con = conection();

$nomProceso = $_POST['nuevo_nombre'];

$query = "DELETE FROM procesos WHERE nombre_proceso = '$nomProceso'";
$result = mysqli_query($con, $query);


if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}


mysqli_close($con);