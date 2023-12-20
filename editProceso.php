<?php
include('conection.php');
$con = conection();
$sql = "SELECT * FROM procesos";
$query = mysqli_query($con, $sql);
$sql2 = "SELECT medidor FROM procesos group BY medidor";
$query2 = mysqli_query($con, $sql2);
$sql3 = "SELECT medidor FROM procesos group BY medidor";
$query3 = mysqli_query($con, $sql3);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        background: url('img/circuito.avif') no-repeat center center fixed;
        background-size: cover;
    }
    </style>
</head>


<body style="background-color:black" ;>




    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-dark"
                    style="background-color: #20279F; border-radius: 10px; font-size: 18px; color: aqua;">

                    <div>
                        <a class="navbar-brand" href="#" style="margin-left: 20px;">Ir a</a>
                    </div>
                    <div class="col-md-4">
                        <button onclick="redirigirAotroArchivo()" class="rounded btn btn-success"
                            style="margin-left: 50px;">
                            Ingreso datos
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="rounded btn btn-danger" href="#" style="margin-left: 50px;"
                                    onclick="redirigirAotroArchivo1()">Ver Producción</a>
                            </li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" style="margin-left: 200px;"
                                    onclick="redirigirAotroArchivo2()">Ver Procesos</a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------------------------------------------------- -->


    </div>
    <div class="container mt-4">
        <div class="card rounded shadow">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">

                        <label for="procesos" class="form-label">Lista Procesos</label>
                        <select class="form-select" id="procesos" name="procesos" onchange="seleccionarProceso()">
                            <option value="" selected disabled>Seleccione proceso</option>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                                echo "<option value=" . $row['procesos_id'] . ">" . $row['nombre_proceso'] . "</option>";
                            };
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">editor de Procesos</label>
                        <input type="text" class="form-control " id="nombreProcesoEditado" ">
                        </div>

                    
                        <div class=" col-md-3">
                        <label class="form-label">Maximo operadores</label>

                        <input type="number" class="form-control" id="max_operadores1" name="max_operadores1"
                            placeholder="max operadores">

                    </div>

                    <div class=" col-md-3">
                        <label class="form-label">Piezas/hora</label>
                        <input type="number" class="form-control" id="valor_proceso" placeholder="Valor Proceso">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Unidad de Medidas</label>
                        <select class="form-select" id="uni_med" name="uni_med" onchange="seleccionarProceso2()">
                            <option value="" selected disabled>Seleccione medidor</option>
                            <?php
                            while ($row = mysqli_fetch_array($query2)) {
                                echo "<option value=" . $row['medidor'] . ">" . $row['medidor'] . "</option>";
                            };
                            ?>
                        </select>
                    </div>




                    <br>

                </div>
                <div class="col-md-2 mt-1"><button type="button" id="guardarCambios" class="btn btn-success mt-2"
                        onclick="guardarCambios()">Guardar Cambios</button>
                </div>
                <div class="col-md-2 mt-1"><button type="button" class="btn btn-danger mt-2"
                        onclick="eliminarProceso()">eliminar proceso</button>
                </div>
            </div>

        </div>
        <div class="card shadow mt-4">
            <div class="card-body">
                <!-- <form action="agregarNuevoProceso.php" method="POST"> -->

                <div class="row">
                    <div class="col-md-3">
                        <label for="nuevoProceso" class="form-label">Nuevo proceso</label>
                        <input type="text" class="form-control" id="nuevoProceso" name="nuevoProceso"
                            placeholder="Nuevo proceso">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Maximo operadores</label>

                        <input type="number" class="form-control" id="max_operadores2" name="max_operadores2"
                            placeholder="maxoperadores">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Piezas por hora</label>

                        <input type="number" class="form-control" id="pzs_hra" name="pzs_hra"
                            placeholder="piezas por hora">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Unidad de Medidas</label>
                        <select class="form-select" id="uni_med2" name="uni_med2" onchange="seleccionarProceso2()">
                            <option value="">Seleccione medidor</option>
                            <?php
                            while ($row = mysqli_fetch_array($query3)) {
                                echo "<option value=" . $row['medidor'] . ">" . $row['medidor'] . "</option>";
                            };
                            ?>
                        </select>

                    </div>

                </div>
                <br>
                <button type="button" id="agregarP" class="btn btn-primary">Agregar proceso</button>
                <!-- </form> -->
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script src="js/funcionEditProcesos.js"></script>
</body>

</html>