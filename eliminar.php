<?php
include('conection.php');
$con = conection();


//$cod_proceso = $_POST['codigo_proceso'];  
$id = $_GET['id'];

$query = "DELETE FROM produccion WHERE produccion_id = '$id' ";
$result = mysqli_query($con, $query);


if ($result) {
    header("location: verData.php");
} else {
    echo "<script>alert('no se eliminó la linea');</script>";
}
