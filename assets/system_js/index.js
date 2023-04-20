var urlIndex = $("#rutaclases").val() + "clsIndex.php";
var urlFamilia = $("#rutaclases").val() + "clsFamilia.php";

$("#btnRegistrarFamilia").click(function () {
    $('#txtCodigoFamilia').prop('readonly', true);
    $('#lblTituloFamilia').html("Registrar Nueva Familia");
    $('#lblTipoFamiliaRegistro').val("N");
    var nuevocodigo = GenerarCodigo(20);
    $('#txtCodigoFamilia').val(nuevocodigo);
    $('#lblTextoBtnSaveFamilia').html("Registrar Nueva Familia");
    $('#lblTextoBtnCodigoFamiliaBC').html("Copiar");
    $('#txtNombreFamilia').prop('readonly', false);
    $('#lblCodigoFamilia').html(nuevocodigo);
    $('#btnCodigoFamiliaBC').prop('readonly', true);
});

function GenerarCodigo(cantidad) {
    const minus = "1234567890";
    const mayus = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var contra = '';
    for (var i = 1; i <= cantidad; i++) {
        var eleccion = Math.floor(Math.random() * 3 + 1);
        if (eleccion == 1) {
            var caracter1 = minus.charAt(Math.floor(Math.random() * minus.length));
            contra += caracter1;
        } else {
            if (eleccion == 2) {
                var caracter2 = mayus.charAt(Math.floor(Math.random() * mayus.length));
                contra += caracter2;
            } else {
                var num = Math.floor(Math.random() * 10);
                contra += num;
            }
        }
    }
    return contra;
}

function Copiar(element) {
    //creamos un input que nos ayudara a guardar el texto temporalmente
    var $temp = $("<input>");
    //lo agregamos a nuestro body
    $("body").append($temp);
    //agregamos en el atributo value del input el contenido html encontrado
    //en el td que se dio click
    //y seleccionamos el input temporal
    $temp.val($(element).html()).select();
    //ejecutamos la funcion de copiado
    document.execCommand("copy");
    //eliminamos el input temporal
    $temp.remove();
}

$("#btnSaveFamilia").click(function () {
    var valor = $('#lblTipoFamiliaRegistro').val()
    var txtCodigoFamilia = $("#txtCodigoFamilia").val();
    var txtNombreFamilia = $("#txtNombreFamilia").val();
    if (txtCodigoFamilia.length == "") {
        mostrarMSG(false, "El código de familia es obligatorio.", "divmsgFamilia");
        $("#txtCodigoFamilia").focus();
    }
    else if (txtNombreFamilia.length == "") {
        mostrarMSG(false, "El nombre de familia es obligatorio.", "divmsgFamilia");
        $("#txtCodigoFamilia").focus();
    }
    else {
        if (valor == "N") { // Registro Nuevo
            var data = {
                'Option': 'nueva',
                '_CodigoFamilia': txtCodigoFamilia,
                '_NombreFamilia': txtNombreFamilia
            }
            $.ajax({
                type: "post",
                url: urlFamilia,
                data: data,
                beforeSend: function () {
                },
                success: function (resultadoreg) {
                    console.log(resultadoreg);
                    if (resultadoreg.length > 0) {
                        if (resultadoreg[0]['mensaje'] == "Registro exitoso.") {
                            location.reload();
                        }
                        else {
                            mostrarMSG(false, resultadoreg[0]['mensaje'], "divmsgFamilia");
                        }
                    }
                },
                error: function (xhr, status) {
                    mostrarMSG(false, status, "divmsgFamilia");
                },
                complete: function (xhr, status) {
                    console.log('Proceso Completado.');
                }
            });
        }
        else {

        }
    }
});

function mostrarMSG(status, msg, div) {
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
    $("#" + div).html(msgdiv);
    $("#" + div).show();
    setTimeout(function () {
        $("#" + div).fadeOut('slow');
    }, 5000);
}


$("#btnCodigoFamiliaBC").click(function () {
    Copiar('#lblCodigoFamilia');
    mostrarMSG(true, "Código copiado al portapapeles.", "divmsgFamilia");
});

$("#btnSeleccionarFamilia").click(function () {
    $('#lblTituloFamilia').html("Seleccionar Familia existente");
    $('#lblTextoBtnSaveFamilia').html("Guardar Cambios");
    $('#txtNombreFamilia').val('');
    $('#txtCodigoFamilia').val('');
    $('#lblCodigoFamilia').val('');
    $('#lblTextoBtnCodigoFamiliaBC').html("Buscar");
    $('#btnCodigoFamiliaBC').prop('readonly', false);
    $('#txtCodigoFamilia').prop('readonly', false);
    $('#txtNombreFamilia').prop('readonly', true);
    $('#lblTipoFamiliaRegistro').val("B");
});


