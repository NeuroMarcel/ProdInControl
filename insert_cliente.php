<?php
include('conection.php');
$con = conection();

$id_cliente = null;
$Nombre_cliente = $_POST['Nombre_cliente'];
$Direccion = $_POST['Direccion'];



$sql = "INSERT INTO datos_cliente (Nombre_cliente, Direccion) VALUES( '$Nombre_cliente', '$Direccion')";
$query = mysqli_query($con, $sql);

if ($query) {
    $response['success'] = true;

    Header("location: index.php");
} else {
    echo "Error: " . mysqli_error($con);
};