var url = $("#rutaclases").val() + "clsNotificacion.php";

$("#btn_notificacion").click(function () {    
    obtner_notificacion();
});


function obtner_notificacion() {
    var DATA = {
        'Option': 'notificacion'
    }
    $.ajax({
        type: "post",
        url: url,
        data: DATA,
        beforeSend: function () { },
        success: function (resultadoreg) {
            console.log(resultadoreg);
            if (resultadoreg[0]['mensaje'] != "") {
                var msg = resultadoreg[0]['mensaje'];
                var msgclass = "danger";
                var msgdiv = `<div class="alert alert-` + msgclass + ` alert-dismissible fade show"
                     role="alert">
                     <strong>AylluTanta:</strong> `+ msg + `
                     <button type="button" class="close" data-dismiss="alert"
                         aria-label="Close">
                         <span class="fa fa-times"></span>
                     </button>
                 </div>`;
                $("#divnotif").html(msgdiv);
                $("#divnotif").show();
                setTimeout(function () {
                    $("#divnotif").fadeOut('slow');
                }, 10000);
            }
        },
        error: function (xhr, status) {
            console.log(xhr);
            //mostrarMSG(false, resultadoreg[0]['mensaje']);
        },
        complete: function (xhr, status) {
            //console.log('Proceso Completado.');
        }
    });
}

obtner_notificacion();

