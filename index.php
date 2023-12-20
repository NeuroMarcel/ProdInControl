<?php
include('conection.php');
$con = conection();
session_start();
//---------------------------------------------
$sql = "SELECT * FROM datos_cliente";
$query = mysqli_query($con, $sql);
//---------------------------------------------
$sql2 = "SELECT * FROM datos_produccion";
$query2 = mysqli_query($con, $sql2);
//---------------------------------------------
$sql3 = "SELECT * FROM produccion_linea";
$query3 = mysqli_query($con, $sql3);
//---------------------------------------------
$sql4 = "SELECT * FROM procesos";
$query4 = mysqli_query($con, $sql4);
//---------------------------------------------
$sql5 = "SELECT * FROM maquina";
$query5 = mysqli_query($con, $sql5);
//---------------------------------------------
$sql6 = "SELECT * FROM proceso_maquina_fk";
$query6 = mysqli_query($con, $sql6);
//---------------------------------------------
// $sql7 = "SELECT * FROM muestra_produccion";
// $query7 = mysqli_query($con, $sql7);
//---------------------------------------------
$sql_lista_operadores = "SELECT * FROM operadores";
$query_lista_operadores = mysqli_query($con, $sql_lista_operadores);
//---------------------------------------------
$sql_nombre_operador = "SELECT * FROM operadores";
$query_nombre_operador = mysqli_query($con, $sql_nombre_operador);
//---------------------------------------------
$produccion = "select * from produccion";

$sql8 = "SELECT * FROM procesos";
$query8 = mysqli_query($con, $sql8);
?>




<!DOCTYPE html>
<html lang="es">
<!-- //------------------------------------------------------------------------------------
//--------------------------------------HTML------------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------ -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Datos Producción en Línea</title>
    <style>
    body {
        background: url('img/circuito.avif') no-repeat center center fixed;
        background-size: cover;
    }
    </style>
</head>

<body style="background-color:black" ;>
    <div style="color: aquamarine; font-size: 28px;">
        <?php
        echo $_SESSION['Nombre'];
        ?><br>
        <?php
        echo $_SESSION['Tipo_usuario'];
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-dark"
                    style="background-color: #20279F; border-radius: 10px; font-size: 18px; color: aqua;">

                    <div>
                        <a class="navbar-brand" href="#" style="margin-left: 20px;">Ir a</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="rounded btn btn-warning" href="#" style="margin-left: 50px;"
                                    onclick="redirigirAotroArchivo1()">Ver Producción</a>
                            </li>
                            <li class="nav-item">
                                <a class="rounded btn btn-danger" href="#" style="margin-left: 50px;"
                                    onclick="redirigirAotroArchivo1()">Ver Producción</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------------------------------------------------- -->
    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <h1 class="my-5" style="color: aquamarine;">Datosssssssssss Cliente </h1>


                <div class="card bg-warning">
                    <div class="card-body">
                        <form action="insert_cliente.php" method="POST">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Nombre_cliente" class="form-label">Nombre Cliente</label>
                                    <input type="text" class="form-control" id="Nombre_cliente" name="Nombre_cliente"
                                        placeholder="Nombre Cliente">

                                </div>
                                <div class="col-md-6">
                                    <label for="id_pedido" class="form-label">ID Pedido</label>
                                    <input type="text" class="form-control" id="id_pedido" name="id_pedido"
                                        placeholder="ID Pedido">
                                </div>
                                <div class="md-6">

                                    <label for="Direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="Direccion" name="Direccion"
                                        placeholder="Direccion">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                        </form>
                    </div>
                </div>
                <br>

                <h1 class="my-5" style="color: aquamarine;">Datos Produccion</h1>
                <div class="card bg-secondary">
                    <div class="card-body">
                        <form action="insert_produccion.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="datos_produccion_id" class="form-label">ID Produccion</label>
                                    <input type="text" class="form-control" id="datos_produccion_id"
                                        name="datos_produccion_id" placeholder="ID Produccion">
                                </div>
                                <!-- <td data-hidden-value="produccion_id" class='text-center'><a href='#'
                                        data-produccion-id='<?php echo $produccion_id; ?>' class='actualizar-link'><i
                                            class='fa fa-pencil aria-hidden=true actualizar'></i></a></td> -->

                                <div class="col-md-6">
                                    <label class="form-label">Fecha</label>
                                    <!-- <p>Fecha</p> -->
                                    <input class="form-control" name="datepicker2" id="datepicker2" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Folio</label>
                                    <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">OP</label>
                                    <input type="text" class="form-control" id="op" name="op" placeholder="OP">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Item</label>
                                    <input type="text" class="form-control" id="item" name="item" placeholder="Item">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">Nombre Pedido</label>
                                    <input type="text" class="form-control" id="nombre_pedido" name="nombre_pedido"
                                        placeholder="Nombre Pedido">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad"
                                        placeholder="Cantidad">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar Produccion</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h1 class="my-5" style="color: aquamarine;">Datos Producción en Línea</h1>
                <div class="card bg-info">
                    <div class="card-body">
                        <form action="insert_pr_linea.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Fecha</p>
                                    <input class="form-control" type="text" name="datepicker" id="datepicker"
                                        autocomplete="off">
                                    <!-- <label class="form-label">Folio de Producción</label> -->
                                    <p>Folio</p>
                                    <input type="number" class="form-control" name="folio_produccion"
                                        id="folio_produccion" placeholder="Ingrese folio" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <!-- <label class="form-label">Máquina</label> -->
                                    <p>Máquina</p>
                                    <select class="form-select" id="maquina" name="maquina">
                                        <option value="" disabled selected></option>
                                        <?php
                                        while ($row = mysqli_fetch_array($query5)) {
                                            echo "<option value=" . $row['maquina_id'] . ">" . $row['nombre_maquina'] . "</option>";
                                        };
                                        ?>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Procesos</label>
                                        <!-- <p>Procesos</p> -->
                                        <select class="form-select" id="procesos" name="procesos">
                                            <?php
                                            while ($row = mysqli_fetch_array($query4)) {
                                                echo "<option value=" . $row['procesos_id'] . ">" . $row['nombre_proceso'] . "</option>";
                                            };
                                            ?>
                                        </select>

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">Valor Procesos</label>
                                        <input type="number" class="form-control" id="valor_proceso"
                                            placeholder="Valor Proceso" readonly disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Unidad de medida</label>
                                        <input type="text" class="form-control" name="uni_med" id="uni_med"
                                            placeholder="unidad de medida" readonly disabled>
                                    </div>
                                    <div>
                                        <!-- <p>nombre_proceso</p> -->
                                        <input type="hidden" class="form-control" id="nombre_proceso"
                                            name="nombre_proceso" placeholder="nombre_proceso" readonly>
                                    </div>
                                    <!-- <div>
                                        <p>nombre_proceso</p>
                                        <input type="hidden" class="form-control" id="produccion_linea_id"
                                            name="produccion_linea_id" placeholder="produccion_linea_id" readonly>
                                    </div> -->
                                </div>



                            </div>
                            <div class="row">

                                <div class="row">
                                    <div id="contenedorOperadores">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Cantidad realizada</label>
                                        <input type="number" class="form-control" name="cantidad_pzs" id="cantidad_pzs"
                                            placeholder="ingrese cantidad realizada">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p>Valor total procesado</p>
                                    <input type="number" class="form-control" name="total_proceso" id="total_proceso"
                                        placeholder="Total Proceso" readonly>
                                </div>

                            </div>
                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" id="Agregar_produccion">Agregar
                                        Producción</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



            <tbody id="tbody_muestra"></tbody>

        </div>
    </div>
    </div>


    <div class="container">

        <div class="container mt-5">

        </div>
    </div>


</body>

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="js/funcionEditProcesos.js"></script>
<script src="js/codigoIndex.js"></script>