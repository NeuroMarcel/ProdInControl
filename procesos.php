<?php
include('conection.php');
$con = conection();


$value = $_POST['value'];
//$cod_proceso = $_POST['codigo_proceso'];  

$query = "SELECT w.procesos_id ,w.nombre_proceso  FROM practica.proceso_maquina_fk x 
left join practica.procesos w on w.procesos_id = x.procesos_id 
left join practica.maquina z on z.maquina_id = x.maquina_id 
where x.maquina_id = $value ";
$result = mysqli_query($con, $query);


while ($row = mysqli_fetch_array($result)) {
   $output[] = $row;
}
$data["result"] = [
   "data" => $output,
];
echo json_encode($data, JSON_UNESCAPED_UNICODE);


//echo json_encode("El numero del listado es: ". $cod_proceso, JSON_PRETTY_PRINT);

//tarea pa la casa:
// realizar llamada en la web cuando se ingrese el codigo del operario, llame al nombre del operario al cual está relacionado y 
//lo coloque en la siguiente casilla donde se ingresa 
//el nombre del operario, la casilla no debe ser manipulable y solo debe aparecer el nombre y apellido..
//para dejar la casilla inoperable se debe ir al input y dentro de la etiqueta colocar la funcion "disable"
//para hacer la llamada del nombre del operario se debe seguir los siguientes pasos
//    1) crear una solicitud "$.AJAX" para realizar la consulta, esto se realiza dentro del archvo "index.php"
//    2) dentro del archivo "lista_operadores.php" con la conexion ya configurada, se debe realizar la query para 
      // obtener la consulta, esto debe llevar el ejercicio completo como se encuentra enesta pagina