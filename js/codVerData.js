$(document).ready(function() {
    carga_muestra();


    $('#muestra').on('click', 'i.borrar', function(e) {

        var produccion_id = $(this).closest('tr').find('input[name=produccion_id]').val();



        Swal.fire({
            title: "Are you sure?",
            text: "Seguro que quieres borrar esta tabla?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"

        }).

        then((result) => {
            if (result.isConfirmed) {
                $(this).closest('tr').remove();
                window.location.href = 'eliminar.php?id=' + produccion_id;



                Swal.fire({

                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });

            }

        })



    });

    // function borrarProduccion(produccion_id) {
    //     $.ajax({
    //         url: "muestra_produccion.php",
    //         data: {
    //             produccion_id: produccion_id
    //         },
    //         type: "POST",
    //         dataType: "json",
    //         async: false,
    //         success: function(response) {},
    //         error: function(error) {}
    //     });
    // };

    function carga_muestra() {
        $.ajax({
            url: "muestra_produccion.php",
            type: "POST",
            dataType: "json",
            async: false,
            success: function(response) {
                $("#tbody_muestra").empty();
                if ($.isArray(response.result['data'])) {
                    $.each(response.result['data'], function(k, v) {
                        console.log(v.cantidad_pzs);
                        $("#muestra").find('tbody').append("<tr> " +
                            "<td class='text-center'>" + v.fecha + "</td>" +
                            "<td class='text-center'>" + v.nombre_proceso + "</td>" +
                            "<td class='text-center'>" + v.cantidad_pzs + "</td>" +
                            "<td class='text-center'>" + v.total + "</td>" +
                            "<td class='text-center'>" + v.medidor + "</td>" +
                            "<td class='text-center'><i class='fas fa-trash check red-text fa-xs borrar'></i>" +
                            "<td class='text-center'><a href='actualizar_pr.php?id=" + v
                            .produccion_id + "'" +
                            " class='editar-link'><i class='fa fa-pencil aria-hidden=true actualizar'></i></td>" +
                            "<input type='hidden' name='produccion_id' value='" + v
                            .produccion_id + "'></td>" +
                            "</tr>");
                    });
                }
            },
            error: function(error) {}
        });
    }
});