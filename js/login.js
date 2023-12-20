// $("#ingresar").on("click", function (e) {
//   e.preventDefault();

//   var nombre = $("#username").val();
//   var password = $("#password").val();

//   var logueo = {
//     nombre: nombre,
//     password: password,
//   };

//   iniciarSesion(logueo);
// });

// function iniciarSesion(logueo) {
//   // e.preventDefault();
//   $.ajax({
//     url: "login.php",
//     type: "POST",
//     data: logueo,
//     dataType: "json",
//     caches: false,
//     success: function (response) {
//       console.log("exito");
//     },
//   });
// }

$(document).ready(function () {
  $("#ingresar").on("click", function (e) {
    e.preventDefault();

    var nombre = $("#username").val();
    var password = $("#password").val();

    var logueo = {
      nombre: nombre,
      password: password,
    };

    iniciarSesion(logueo);
  });

  function iniciarSesion(logueo) {
    console.log(logueo);
    $.ajax({
      url: "login.php",
      type: "POST",
      data: logueo,
      dataType: "json",
      cache: false,
      success: function (response) {
        if (response) {
          window.location.href = response;
        } else {
          alert(
            "Usuario o contraseña incorrectos. Por favor, inténtelo de nuevo."
          );
        }
      },
      error: function (xhr, status, error) {
        console.log("Error en la solicitud AJAX:", status, error);
      },
    });
  }
});
