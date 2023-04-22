var url = $("#rutaclases").val() + "clsMochila.php";

$("#btnRegistrarMochila").click(function () {
    $('#lblTituloMochila').html("Registrar Nueva Mochila");
    $('#lblTextoBtnSaveMochila').html("Registrar");
    $('#idMochila').val("0");
    $('#txtDescripcion').val("");
    $('#txtPeso').val("1");
});


function editar(id,descripcion, peso,estado){
    $('#lblTituloMochila').html("Editar Mochila");
    $('#lblTextoBtnSaveMochila').html("Editar");
    $("#idMochila").val(id);
	$("#idMochila").attr("value",id);
    $("#txtDescripcion").val(descripcion);
	$("#txtDescripcion").attr("value",descripcion);
    $("#txtPeso").val(peso);
	$("#txtPeso").attr("value",peso);
    $("#sltEstado").val(estado);
	$("#sltEstado").attr("value",estado);
}    

function mostrarMSG(status, msg) {
    var msgclass = "danger";
    if (status) { msgclass = "success"; }
    var msgdiv = `<div class="alert alert-` + msgclass + ` alert-dismissible fade show"
                     role="alert">
                     <strong>Mensaje:</strong> `+ msg + `
                     <button type="button" class="close" data-dismiss="alert"
                         aria-label="Close">
                         <span class="fa fa-times"></span>
                     </button>
                 </div>`;
    $("#divmsg").html(msgdiv);
    $("#divmsg").show();
    setTimeout(function () {
        $("#divmsg").fadeOut('slow');
    }, 5000);
}

function listar() {
    var Data = {
        'Option': 'listar'
    }
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
                                                <th scope="row">`+ resultado[i].id + `</th>
                                                <td>`+ resultado[i].descripcion + `</td>
                                                <td>`+ resultado[i].peso + ` kg</td>
                                                <td>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar" role="progressbar" style="width: `+ resultado[i].items * 2 + `%;"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">                                                             
                                                        </div>                                                      
                                                    </div>
                                                    <span>`+ resultado[i].items + `</span>
                                                </td>
                                                <td><span class="status-p bg-primary">`+ resultado[i].est + `</span></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center" data-toggle="modal" data-target="#modalMochila" onclick="editar(`+ resultado[i].id + `,'`+ resultado[i].descripcion + `',`+ resultado[i].peso + `,'`+ resultado[i].estado + `')">
                                                        <li class="mr-3"><a href="#" class="text-secondary"><i
                                                                    class="fa fa-edit"></i> Editar</a></li>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>`;
                }
                $("#bodytblReporte").html(trd);
            }
            else {
            }
        },
        error: function (xhr, status) {
        },
        complete: function (xhr, status) {
        }
    });
}

$("#btnSaveMochila").click(function () {
    Registrar_Servicio() 
});

function Registrar_Servicio() {
    var idMochila = $("#idMochila").val();
    var txtDescripcion = $("#txtDescripcion").val();
    var txtPeso = $("#txtPeso").val();
    var sltEstado = $("#sltEstado").val();

    if (txtDescripcion.length == "") {
        mostrarMSG(false, "El campo descripción es obligatorio.");
        $("#txtDescripcion").focus();
    }
    else if (txtPeso.length == "") {
        mostrarMSG(false, "El campo peso es obligatorio.");
        $("#txtPeso").focus();
    }
    else {
        var DATA = {
            'Option': 'RegistrarMochila',
            '_id': idMochila,
            '_descripcion': txtDescripcion,
            '_peso': txtPeso,
            '_estado': sltEstado
        }
        $.ajax({
            type: "post",
            url: url,
            data: DATA,
            beforeSend: function () { },
            success: function (resultadoreg) {
                if (resultadoreg.length > 0) {
                    if (resultadoreg[0]['mensaje'].includes('Exitos')) {
                        $("#modalMochila").hide();
                        $('#modalMochila').modal('hide');
                        listar();
                    }
                    else {
                        mostrarMSG(false, resultadoreg[0]['mensaje']);
                    }
                }
            },
            error: function (xhr, status) {
                mostrarMSG(false, resultadoreg[0]['mensaje']);
            },
            complete: function (xhr, status) {
                console.log('Proceso Completado.');
            }
        });
    }
}


listar();