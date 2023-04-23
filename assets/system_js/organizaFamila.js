var url = $("#rutaclases").val() + "clsOrganizaFamilia.php";
var resultadoreg = [];
function mostrarMSG(status, msg) {
  var msgclass = "danger";
  if (status) {
    msgclass = "success";
  }
  var msgdiv =
    `<div class="alert alert-` +
    msgclass +
    ` alert-dismissible fade show"
                     role="alert">
                     <strong>Mensaje:</strong> ` +
    msg +
    `
                     <button type="button" class="close" data-dismiss="alert"
                         aria-label="Close">
                         <span class="fa fa-times"></span>
                     </button>
                 </div>`;
  $("#divmsg").html(msgdiv);
  $("#divmsg").show();
  setTimeout(function () {
    $("#divmsg").fadeOut("slow");
  }, 5000);
}
function listar() {
  var Data = {
    Option: "listar",
  };
  $.ajax({
    type: "post",
    url: url,
    data: Data,
    beforeSend: function () { },
    success: function (resultado) {
      rsClientes = resultado;
      if (resultado.length > 0) {
        var trd = "";
        for (var i = 0; i < resultado.length; i++) {
          trd += `
                    <tr>
                                <td>resultado[i].dia /td>
                                <td>resultado[i].horario</td>
                                <td>resultado[i].MiembroFamilia</td>
                                <td>resultado[i].PuntoEncuentro</td>
                                <td>resultado[i].TiempoEspera</td>
                                <td>-</td>
                               
                                            </tr>`;
        }
        $("#tableReporteEncuentros").html(trd);
      } else {
      }
    },
    error: function (xhr, status) { },
    complete: function (xhr, status) { },
  });
}
$("#guardarEncuentros").click(function () {
  Registrar_Servicio();
});

function Registrar_Servicio() {
  var dia = $("#dia").val();
  var horario = $("#horario").val();
  var MiembroFamilia = $("#Mfamilia").val();
  var PuntoEncuentro = $("#Pencuentro").val();
  var TiempoEspera = $("#Tespera").val();

  if (horario.length == "") {
    mostrarMSG(false, "El campo Horario es obligatorio.");
    $("#horario").focus();
  } else if (PuntoEncuentro.length == "") {
    mostrarMSG(false, "El campo Encuentro es obligatorio.");
    $("#Pencuentro").focus();
  } else {
    var DATA = {
      Option: "Registrar",
      _dia: dia,
      _horario: horario,
      _miembroFamilia: MiembroFamilia,
      _puntoEncuentro: PuntoEncuentro,
      _tiempoEspera: TiempoEspera,
    };
    $.ajax({
      type: "post",
      url: url,
      data: DATA,
      beforeSend: function () {

      },
      success: function (resultadoreg) {
        console.log(resultadoreg);
        if (typeof resultadoreg !== 'undefined' && resultadoreg.length > 0) {
          if (resultadoreg[0]["mensaje"].includes("Exitos")) {
            $("#tableReporteEncuentros").hide();
            $("#tableReporteEncuentros").modal("hide");
            listar();
          } else {
            mostrarMSG(false, resultadoreg[0]["mensaje"]);
          }
        } else {
          mostrarMSG(false, "La respuesta del servidor está vacía o no está definida.");
        }
      },
      error: function (xhr, status) {
        mostrarMSG(false, resultadoreg[0]["mensaje"]);
      },
      complete: function (xhr, status) {
        console.log("Proceso Completado.");
      },
    });
  }
}

listar();
