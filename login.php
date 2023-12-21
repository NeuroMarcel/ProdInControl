<?php
include('conection.php');
$con = conection();

$UserName = mysqli_real_escape_string($con, $_POST['nombre']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$sql = "SELECT * FROM practica.login WHERE Usuario = '$UserName' AND Password = '$password'";
$query = mysqli_query($con, $sql);

if ($query) {
    $row = mysqli_fetch_assoc($query);


    if ($row) {
        // Inicio de sesión exitoso, 
        //puedes almacenar la información del usuario en variables de sesión si lo deseas.
        session_start();
        $_SESSION['User_id'] = $row['User_id'];
        $_SESSION['Nombre'] = $row['Nombre'];
        $_SESSION['Tipo_usuario'] = $row['Tipo_usuario'];

        // header("location: index.php");

        echo json_encode("https://github.com/NeuroMarcel/index.php", JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode("", JSON_UNESCAPED_UNICODE);
    }
} else {
    echo "Error: " . mysqli_error($con);
}


mysqli_close($con);
