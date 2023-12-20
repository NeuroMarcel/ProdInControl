<?php 

include('conection.php');
$con = conection();

$maquina_id = null;
$nombre_maquina = $_POST['$nombre_maquina'];

$sql5 = "INSERT INTO maquina('$maquina_id','$nombre_maquina')";

$query5 = mysqli_query($con,$sql5);
 
if($query5){
    Header("location: index.php");
};




?>