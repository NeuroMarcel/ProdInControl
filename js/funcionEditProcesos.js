function seleccionarProceso() {
  var selectValor = $("#procesos").val();
  var mOper = $("#max_operadores1").val();
  var select_valor_proceso = $("#valor_proceso").val();
  var select_uni_med = $("#uni_med").val();

  $("#nombreProcesoEditado").val($("#procesos option:selected").text()).show();
  $("#procesos").show();
  $("#max_operadores1").show();
  $("#valor_proceso").show();
  $("#uni_med").val($("#uni_med option:selected").text()).show();

  $("#uni_med").show();
  $("button").show();
}
function seleccionarProceso2() {
  var selectValor = $("#procesos").val();
  var mOper = $("#max_operadores1").val();
  var select_valor_proceso = $("#valor_proceso").val();
  var select_uni_med = $("#uni_med").val();
}

function editarNombreProceso() {
  $("#nombreProcesoEditado").show();
  $("#procesos").hide();
  $("button").show();
}
function editarMaxOp() {
  $("#max_operadores1").hide();
  $("button").show();
}
function editarValor() {
  $("#valor_proceso").hide();
  $("button").show();
}
function editarMedida() {
  $("#uni_med").hide();
  $("button").show();
}

function guardarCambios() {
  var nuevoNombre = $("#nombreProcesoEditado").val();
  var idProceso = $("#procesos").val();
  var mOper = $("#max_operadores1").val();
  var val_proceso = $("#valor_proceso").val();
  var unidad_med = $("#uni_med").val();

  Swal.fire({
    title: "Do you want to save the changes?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Save",
    denyButtonText: `Don't save`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $.ajax({
        url: "guardarNomProceso.php",
        type: "POST",
        data: {
          id: idProceso,
          nuevo_nombre: nuevoNombre,
          max_op: mOper,
          valor_proceso: val_proceso,
          uni_med: unidad_med,
        },
        dataType: "json",
        cache: false,
        success: function (response) {
          if (response.success) {
            // Puedes mostrar un mensaje de éxito o realizar otras acciones necesarias
            Swal.fire("Saved!", "", "success");
          } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
          }
        },
        error: function () {
          // Manejar el caso de error
          alert("Error al procesar la solicitud");
        },
        async: false,
      });
      window.location.href = "editProceso.php";
    }
    ///editar tambien los valores y unidade
  });
}

function eliminarProceso() {
  var nuevoNombre = $("#nombreProcesoEditado").val();

  Swal.fire({
    title: "Estas seguro?",
    text: "Esto no puede ser revertido!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "eliminarProceso.php",
        type: "POST",
        data: {
          nuevo_nombre: nuevoNombre,
        },
        dataType: "json",
        cache: false,
        success: function (response) {
          if (response.success) {
            // Proceso eliminado correctamente
            Swal.fire({
              title: "Eliminado!",
              text: "El proceso fue eliminado exitosamente.",
              icon: "success",
            }).then(() => {
              // Después de cerrar el cuadro de diálogo, redirige
              window.location.href = "editProceso.php";
            });
          } else {
            // Error al eliminar el proceso
            Swal.fire("Error", "Error al eliminar el proceso", "error");
          }
        },
        error: function () {
          // Error al procesar la solicitud
          Swal.fire("Error", "Error al procesar la solicitud", "error");
        },
      });
    }
  });
}

$("#procesos").on("change", function () {
  var x = $(this).val();
  var y = $(this).find("option:selected").text();

  var parametros = {
    value: $(this).val(),
    value2: y,
  };

  $.ajax({
    url: "aso_procesos.php",
    type: "POST",
    data: parametros,
    dataType: "json",
    success: function (response) {
      //seccion asociada a aso_proceso.php
      var hra = response.result["hra"];
      var max_operadores = response.result["max_operadores"];
      var unidades = response.result["unidades"];
      var nombre_proceso = response.result["nombre_proceso"];
      var produccion_linea_id = response.result["produccion_linea_id"];

      //seccion que muestra respuesta en el front en sus respectivas casillas
      $("#valor_proceso").val(hra);
      $("#max_operadores1").val(max_operadores);
      $("#uni_med").val(unidades);
      $("#nombre_proceso").val(nombre_proceso);
      $("#produccion_linea_id").val(produccion_linea_id);

      // agregarOperadores(max_operadores);
    },
    error: function () {},
  });
});

function redirigirAotroArchivo() {
  window.location.href = "index.php";
}

// ------------------------------------------------------------------------------
// ------------------------------------------------------------------------------

function validarCampo(campo, mensaje) {
  var code = event.keyCode || event.which;
  // if (code == 13) {
  if ($(campo).val() == "") {
    alert(mensaje);
    return false;
  }
  // }
}

// $("#nuevoProceso").on('keydown', function(e) {
//     validarCampo(e, "#nuevoProceso", "Ingrese producción");
// });

// $("#max_operadores2").on('keydown', function(e) {
//     validarCampo(e, "#max_operadores2", "Debe agregar operadores para continuar");
// });

// $("#pzs_hra").on('keydown', function(e) {
//     validarCampo(e, "#pzs_hra", "Debe agregar cantidad para continuar");
// });

// $("#uni_med2").on('keydown', function(e) {
//     validarCampo(e, "#uni_med2", "Debe seleccionar una unidad de medida para continuar");
// });

$("#guardarCambios").on("click", function (e) {
  var a = validarCampo("#procesos", "Ingrese producción");
  if (!a) {
    e.preventDefault();
  }
  var b = validarCampo("#nombreProcesoEditado", "Ingrese producción");
  if (!b) {
    e.preventDefault();
  }

  var c = validarCampo(
    "#max_operadores1",
    "Debe agregar operadores para continuar"
  );
  if (!c) {
    e.preventDefault();
  }
  var d = validarCampo(
    "#valor_proceso",
    "Debe agregar cantidad para continuar"
  );
  if (!d) {
    e.preventDefault();
  }
  var f = validarCampo(
    "#uni_med",
    "Debe seleccionar una unidad de medida para continuar"
  );
  if (!f) {
    e.preventDefault();
  }
});
$("#agregarP").on("click", function (e) {
  // var x =validarCampo("#nuevoProceso", "Ingrese producción");
  // if (!x) {
  //     console.log('qq');
  //     e.preventDefault();
  // }

  // var y =validarCampo("#max_operadores2", "Debe agregar operadores para continuar");
  // if (!y) {
  //     e.preventDefault();
  // }
  // var z =validarCampo("#pzs_hra", "Debe agregar cantidad para continuar");
  // if (!z) {
  //     e.preventDefault();
  // }
  // var q =validarCampo("#uni_med2", "Debe seleccionar una unidad de medida para continuar");
  // if (!q) {
  //     e.preventDefault();
  // }
  guardarCambios2();
});

function guardarCambios2() {
  var nuevoProceso = $("#nuevoProceso").val();
  var pzs_hra = $("#pzs_hra").val();
  var max_operadores2 = $("#max_operadores2").val();
  var uni_med2 = $("#uni_med2").val();

  $.ajax({
    url: "agregarNuevoProceso.php",
    type: "POST",
    data: {
      nuevoProceso: nuevoProceso,
      max_operadores2: max_operadores2,
      pzs_hra: pzs_hra,
      uni_med2: uni_med2,
    },
    dataType: "json",
    cache: false,
    success: function (response) {
      if (response.success) {
        // Puedes mostrar un mensaje de éxito o realizar otras acciones necesarias
        alert("Cambios guardados correctamente");
      } else {
        // Manejar el caso de error
        alert(response.message);
      }
    },
    error: function () {
      // Manejar el caso de error
      alert("Error al procesar la solicitud");
    },
    async: false,
  });
  window.location.href = "editProceso.php";

  ///editar tambien los valores y unidades
}

//----------------Botones barra superior------------

function redirigirAotroArchivo2() {
  window.location.href = "editProceso.php";
}

function redirigirAotroArchivo1() {
  window.location.href = "verData.php";
}
