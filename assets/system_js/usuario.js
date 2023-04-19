var url = $("#rutaclases").val() + "clsUsuario.php";

$("#btnAcceder").click(function () {
    try {
        var usuario = $("#txtEmail").val();
        var clave = $("#txtPassword").val();
        if (usuario.length == "") {
            mostrarMSG(false, "Por favor ingresar el su email para poder acceder.");
            $("#txtEmail").focus();
        }
        else if (clave.length == "") {
            mostrarMSG(false, "Por favor ingresar su contraseña.");
            $("#txtPassword").focus();
        }
        else {
            var data = {
                'Option': 'login',
                '_usuario': usuario,
                '_clave': clave
            }
            console.log(data);
            $.ajax({
                type: "post",
                url: url,
                data: data,
                beforeSend: function () {
                },
                success: function (resultadoreg) {
                    console.log(resultadoreg);
                    if (resultadoreg.length > 0) {
                        if (resultadoreg[0]['mensaje'].substring(0, 10) == "Bienvenido") {
                            Object.assign(document.createElement("a"), {
                                href: "system/index.php"
                            }).click();
                        }
                        else {
                            mostrarMSG(false, resultadoreg[0]['mensaje']);
                        }
                    }
                },
                error: function (xhr, status) {
                    //"¡Ocurrió un error! Por favor volver a intentarlo. :C "+
                    mostrarMSG(false, status);
                },
                complete: function (xhr, status) {
                    console.log('Proceso Completado.');
                }
            });
        }
    }
    catch (e) {
        console.log(e);
    }
});


$("#btnRegisrar").click(function () {
    var txtNroDoc = $("#txtNroDoc").val();
    var txtNombres = $("#txtNombres").val();
    var txtApellidos = $("#txtApellidos").val();
    var txtEmail = $("#txtEmail").val();
    var txtPassword = $("#txtPassword").val();
    var txtPassword2 = $("#txtPassword2").val();

    if (txtNroDoc.length == "") {
        mostrarMSG(false, "Por favor ingresar el número de documento.");
        $("#txtNroDoc").focus();
    }
    else if (txtNombres.length == "") {
        mostrarMSG(false, "Por favor ingresar su(s) Nombre(s).");
        $("#txtNombres").focus();
    }
    else if (txtApellidos.length == "") {
        mostrarMSG(false, "Por favor ingresar sus Apellidos.");
        $("#txtApellidos").focus();
    }
    else if (txtEmail.length == "") {
        mostrarMSG(false, "Por favor ingresar su correo electrónico.");
        $("#txtEmail").focus();
    }
    else if (txtPassword.length == "") {
        mostrarMSG(false, "Por favor ingresar su contraseña.");
        $("#txtPassword").focus();
    }
    else if (txtPassword2.length == "") {
        mostrarMSG(false, "Por favor repita la contraseña.");
        $("#txtPassword").focus();
    }
    else if (txtPassword2 != txtPassword) {
        mostrarMSG(false, "Las contraseñas son diferentes.");
        $("#txtPassword").focus();
    }
    else{
        var data = {
            'Option': 'registrar',
            '_nrodoc': txtNroDoc,
            '_nombres': txtNombres,
            '_apellidos': txtApellidos,
            '_email': txtEmail,
            '_password': txtPassword
        }
        console.log(data);
        $.ajax({
            type: "post",
            url: url,
            data: data,
            beforeSend: function () {
            },
            success: function (resultadoreg) {
                console.log(resultadoreg);
                if (resultadoreg.length > 0) {
                    if (resultadoreg[0]['mensaje'].substring(0, 8) == "Registro") {
                        mostrarMSG(true, resultadoreg[0]['mensaje']);
                    }
                    else {
                        mostrarMSG(false, resultadoreg[0]['mensaje']);
                    }
                }
            },
            error: function (xhr, status) {
                //"¡Ocurrió un error! Por favor volver a intentarlo. :C "+
                mostrarMSG(false, status);
            },
            complete: function (xhr, status) {
                console.log('Proceso Completado.');
            }
        });
    }
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