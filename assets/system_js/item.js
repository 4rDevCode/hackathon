var url = $("#rutaclases").val() + "clsItem.php";

$("#btnRegistrarItem").click(function () {
    $('#lblTituloItem').html("Registrar Nuevo Item");
    $('#lblTextoBtnSaveItem').html("Registrar");
    $('#idItem').val("0");
    $('#sltTipo').val("Alimento");
    $('#txtNombre').val("");
    $('#txtCantidad').val("1");
    $('#sltEstado').val("A");

  
});

/*
$('#ckbVence').change(function () {
    if (!$(this).is(':checked')) {
        $('#txtFechaVencimiento').prop('readonly', true);
    }
    else {
        $('#txtFechaVencimiento').prop('readonly', false);
    }
});
*/
function editar(id, tipo, nombre, cantidad, fecha, estado) {
    $('#lblTextoBtnSaveItem').html("Editar");
    $("#idItem").val(id);
    $("#idItem").attr("value", id);
    $("#txtDescripcion").val(descripcion);
    $("#txtDescripcion").attr("value", descripcion);
    $("#txtPeso").val(peso);
    $("#txtPeso").attr("value", peso);
    $("#sltEstado").val(estado);
    $("#sltEstado").attr("value", estado);
}

function llenarMochila() {
    var Data = {
        'Option': 'llenarMochila'
    }
    $.ajax({
        type: "post",
        url: url,
        data: Data,
        beforeSend: function () {
        },
        success: function (resultado) {
            if (resultado.length > 0) {
                var trd = "";
                for (var i = 0; i < resultado.length; i++) {
                    trd += `<option value="` + resultado[i].id + `">` + resultado[i].descripcion + `</option>`;
                }
                $("#sltMochila").attr("disabled", false);
                $("#sltMochila").html(trd);
                var id = $("#sltMochila").val();
                $('#btnCodigoFamiliaBC').prop('disabled', false);
                listar(id);
            }
            else {
                $("#sltMochila").attr("disabled", true);
                $('#btnCodigoFamiliaBC').prop('disabled', true);
            }
        },
        error: function (xhr, status) {
        },
        complete: function (xhr, status) {

        }
    });
}

$("#sltMochila").change(function () {
    var id = $("#sltMochila").val();
    listar(id);
});

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

function listar(id) {
    var Data = {
        'Option': 'listar',
        '_idmochila': id
    }
    $.ajax({
        type: "post",
        url: url,
        data: Data,
        beforeSend: function () { },
        success: function (resultado) {
            if (resultado.length > 0) {
                var trd = "";
                for (var i = 0; i < resultado.length; i++) {
                    trd += `
                    <tr>
                        <th scope="row">`+ resultado[i].id + `</th>
                        <td>`+ resultado[i].tipo + `</td>
                        <td>`+ resultado[i].nombre + `</td>
                        <td>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: `+ resultado[i].cantidad * 2 + `%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">                                                             
                                </div>                                                      
                            </div>
                            <span>`+ resultado[i].cantidad + `</span>
                        </td>
                        <td>`+ resultado[i].fecha_vencimiento + `</td>
                        <td><span class="status-p bg-primary">`+ resultado[i].est + `</span></td>
                        <td>
                            <ul class="d-flex justify-content-center" data-toggle="modal" data-target="#modalItem" onclick="editar(`+ resultado[i].id + `,'` + resultado[i].tipo + `','` + resultado[i].nombre + `',`+ resultado[i].cantidad + `,'` + resultado[i].fecha + `','` + resultado[i].estado + `')">
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
                $("#bodytblReporte").html("");                                                                                                  
            }
        },
        error: function (xhr, status) {
        },
        complete: function (xhr, status) {
        }
    });
}

$("#btnSaveItem").click(function () {
    Registrar_Item()
});

function Registrar_Item() {
    var idItem = $("#idItem").val();
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
            'Option': 'RegistrarItem',
            '_id': idItem,
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
                        $("#modalItem").hide();
                        $('#modalItem').modal('hide');
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

llenarMochila();
listar();