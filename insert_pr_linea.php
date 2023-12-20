<?php
include('conection.php');
$con = conection();

$produccion_linea_id = null;
$fecha = $_POST['datepicker'];
$fecha = date('Y-m-d', strtotime($fecha));

$folio_produccion = $_POST['folio_produccion'];
$maquina = $_POST['maquina'];
$cod_proceso = $_POST['procesos'];
$nombre_proceso = $_POST['nombre_proceso'];
$cantidad_pzs = $_POST['cantidad_pzs'];
$total = $_POST['total_proceso'];
$cod_operador1 = isset($_POST['cod_operador1']) ? $_POST['cod_operador1'] : "";
$cod_operador2 = isset($_POST['cod_operador2']) ? $_POST['cod_operador2'] : "";
$cod_operador3 = isset($_POST['cod_operador3']) ? $_POST['cod_operador3'] : "";
$nombre_operador1 = isset($_POST['nombre_operador1']) ? $_POST['nombre_operador1'] : "";
$nombre_operador2 = isset($_POST['nombre_operador2']) ? $_POST['nombre_operador2'] : "";
$nombre_operador3 = isset($_POST['nombre_operador3']) ? $_POST['nombre_operador3'] : "";

$i = 0;
if ($cod_operador1 != "") $i++;
if ($cod_operador2 != "") $i++;
if ($cod_operador3 != "") $i++;

$query_insert = "INSERT INTO practica.produccion
( folio, maquina, cod_proceso, nombre_proceso, cantidad_pzs, total,fecha)
VALUES( $folio_produccion, '$maquina', $cod_proceso, '$nombre_proceso', $cantidad_pzs, $total,'$fecha')";
$query3 = mysqli_query($con, $query_insert);

$produccion_id = mysqli_insert_id($con);

$total = $total / $i;

if ($cod_operador1 != "") {

    $insert_primer = "INSERT INTO practica.produccion_linea
    ( produccion_id, codigo_operario, total)
    VALUES( $produccion_id, $cod_operador1, $total);";
    $query3 = mysqli_query($con, $insert_primer);
}

if ($cod_operador2 != "") {

    $insert_primer = "INSERT INTO practica.produccion_linea
    ( produccion_id, codigo_operario, total)
    VALUES( $produccion_id, $cod_operador2, $total);";
    $query3 = mysqli_query($con, $insert_primer);
}

if ($cod_operador3 != "") {

    $insert_primer = "INSERT INTO practica.produccion_linea
    ( produccion_id, codigo_operario, total)
    VALUES( $produccion_id, $cod_operador3, $total);";
    $query3 = mysqli_query($con, $insert_primer);
}

if ($query3) {
    Header("location: index.php");
} else {
    echo "Error: " . mysqli_error($con);
};