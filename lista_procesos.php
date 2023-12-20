<?php 

include('conection.php');
$con = conection();

$proceso_id = NULL;
$nombre_proceso = $_post['$nombre_proceso'];
$num_operadores = $_POST['$num_operadores'];
$pzs_hr = $_POST['$pzs_hr'];
$medidor = $_POST['$medidor'];

$sql4 = "INSERT INTO proceso Values('$proceso_id','$nombre_proceso','$num_operadores','$pzs_hr','$medidor')";
$query4 = mysqli_query($con, $sql4);

if($query4){
    Header("location: index.php");
};




?>