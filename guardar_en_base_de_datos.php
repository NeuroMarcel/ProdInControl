<?php
include('conection.php');
$con = conection();

// Obtener los valores de los tres inputs enviados por AJAX

$cod_operador1 = $_POST['cod_operador1'];
$cod_operador2 = $_POST['cod_operador2'];
$cod_operador3 = $_POST['cod_operador3'];

// Realizar la lógica para insertar los datos en la base de datos
$query = "INSERT INTO practica.produccion_linea (folio, cantidad_pzs, cod_operador) VALUES (?, ?, ?)";
$stmt = $con->prepare($query);
$stmt->bind_param("sss", $cod_operador1, $cod_operador2, $cod_operador3);
$stmt->execute();

// Verificar si la inserción fue exitosa
if ($stmt->affected_rows > 0) {
    echo "Datos guardados correctamente en la base de datos";
} else {
    echo "Error al guardar en la base de datos";
}

// Cerrar la conexión
$stmt->close();
$con->close();