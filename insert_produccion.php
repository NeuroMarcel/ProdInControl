<?php
include('conection.php');
$con = conection();

$datos_produccion_id = NULL;
$fecha = $_POST['datepicker2'];
$folio = $_POST['folio'];
$op = $_POST['op'];
$item = $_POST['item'];
$nombre_pedido = $_POST['nombre_pedido'];
// $total_cant_productos = $_POST['total_cant_productos'];
// $total_pzs_realizadas = $_POST['total_pzs_realizadas'];



$sql = "INSERT INTO practica.datos_produccion
( fecha, op, item, nombre_pedido,  folio)
VALUES( '$fecha', $op, $item, '$nombre_pedido',  $folio)";
$query = mysqli_query($con, $sql);


if ($query) {
    Header("location: index.php");
} else {
    echo "Error: " . mysqli_error($con);
};
//_______________________________________________________________________