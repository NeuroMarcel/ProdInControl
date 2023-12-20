<?php
include('conection.php');
$con = conection();

// Obtener el código de operador enviado por AJAX
$codigoOperador = $_POST['codigo_operador'];

// Consultar la base de datos para obtener el nombre del operador
$query = "SELECT nombre_operador as nombre FROM practica.operadores WHERE codigo_operador = ?";

// Preparar la declaración
$stmt = $con->prepare($query);
$stmt->bind_param("s", $codigoOperador);
$stmt->execute();

// Obtener resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Devolver el nombre del operador si se encuentra en la base de datos
    $row = $result->fetch_assoc();
    $row["nombre"] = "Nombre: " . $row["nombre"];
    $data["result"] = [
        "data" => $row,
    ];
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    // Devolver un mensaje de error si el operador no se encuentra
    echo json_encode(["error" => "Operador no encontrado"], JSON_UNESCAPED_UNICODE);
}

// Cerrar la conexión
$stmt->close();
$con->close();
