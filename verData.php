<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #20279F; border-radius: 10px; font-size: 18px; color: aqua;">

                        <div>
                            <a class="navbar-brand" href="#" style="margin-left: 20px;">Ir a</a>
                        </div>
                        <div class="col-md-4">
                            <button onclick="redirigirAotroArchivo()" class="rounded btn btn-success" style="margin-left: 50px;">
                                Ingresar nuevos datos
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="rounded btn btn-warning" href="#" style="margin-left: 50px;" onclick="redirigirAotroArchivo2()">Ver Procesos</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="card rounded shadow p-3 mb-5 bg-white">
                <div class="row text-dark p-4">
                    <div class="col-md-12">
                        <button onclick="redirigirAotroArchivo()" class="btn btn-primary">
                            <-- Volver </button>

                                <script>
                                    function redirigirAotroArchivo() {
                                        window.location.href = 'index.php';
                                    }
                                </script>

                                <h1 class="my-5">Edicion</h1>

                                <table class="table table-bordered border-primary mt-3 table-secondary" name="muestra" id="muestra">
                                    <tr>
                                        <td scope="col" name="date" id="date">Fecha</td>
                                        <td scope="col" name="nombre_proceso" id="nombre_proceso">Nombre Proceso</td>
                                        <td scope="col" name="cant_pzs" id="cant_pzs">Cantidad Pzs</td>
                                        <td scope="col" name="total_prod" id="total_prod">Total Produccion</td>
                                        <td scope="col" name="medidor" id="medidor">unidad_medida</td>
                                        <td scope="col" name="medidor" id="medidor">eliminar</td>
                                        <td scope="col" name="medidor" id="medidor">editar</td>
                                    </tr>
                                </table>
                    </div>

                    <div>
                        <table class="table table-bordered border-primary shadow p-3 mb-5 bg-white rounded"></table>
                    </div>
                </div>

                <table class="table table-bordered border-primary shadow p-3 mb-5 bg-white rounded">
                    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Editar Información</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formularioEdicion">
                                        <div class="alert alert-primary" role="alert">
                                            <label for="editNombreProceso" class="form-label">Nombre Proceso</label>
                                            <input type="text" class="form-control" id="editNombreProceso" name="editNombreProceso">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

    <div class="container">
        <div class="container mt-5"></div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="js/funcionEditProcesos.js"></script>
    <script src="js/codVerData.js"></script>

</body>

</html>