var url = "http://comsys.ferbecs.com/cnx/clases/clsEinvoice.php";
var rs_einvoice = [];

function load() {
    $('#btnPDF').hide();
    $('#btnXML').hide();
    $('#btnCDR').hide();
    $('#btnCancelar').hide();    
    $("#divmsg").html("");
    var d = new Date(); 
    var mes = (d.getMonth()+1); var _mes = "0";
    if(mes <= 9){ _mes = "0"+mes; } else { _mes = mes}
    var strDate = d.getFullYear() + "-" + _mes + "-" + d.getDate();
    $("#txtFecha").val(strDate);            	$("#txtFecha").attr("value", strDate);
}

function temporal(){
    $("#txtRuc").val("10757306722");            	$("#txtRuc").attr("value", "10757306722");
    $("#sltTipo").val("03");           	$("#sltTipo").attr("value", "03");
    $("#txtSerie").val("B001");            	$("#txtSerie").attr("value", "B001");
    $("#txtCorrelativo").val("00000026");            	$("#txtCorrelativo").attr("value", "00000026");
    $("#txtTotal").val("10");            	$("#txtTotal").attr("value", "10");
    $("#txtFecha").val("2022-09-16");            	$("#txtFecha").attr("value", "2022-09-16");
}
$('#txtRuc').keyup(function () {
    this.value = (this.value + '').replace(/[^0-9]/g, '');
});
$('#txtCorrelativo').keyup(function () {
    this.value = (this.value + '').replace(/[^0-9]/g, '');
});
$("#btnCancelar").click(function () {
    $('#btnPDF').hide();
    $('#btnXML').hide();
    $('#btnCDR').hide();
    $('#btnCancelar').hide();    
    $('#btnConsultar').show();   
    $("#txtRuc").val("");            	$("#txtRuc").attr("value", "");
    $("#sltTipo").val("01");           	$("#sltTipo").attr("value", "01");
    $("#sltTipo").val("01");           	$("#sltTipo").attr("value", "01");
    $("#txtSerie").val("");            	$("#txtSerie").attr("value", "");
    $("#txtCorrelativo").val("");            	$("#txtCorrelativo").attr("value", "");
    $("#txtTotal").val("");            	$("#txtTotal").attr("value", "");
    $("#txtId").val("0");            	$("#txtId").attr("value", "0");
    //Fecha
    var d = new Date(); 
    var mes = (d.getMonth()+1); var _mes = "0";
    if(mes <= 9){ _mes = "0"+mes; } else { _mes = mes}
    var strDate = d.getFullYear() + "-" + _mes + "-" + d.getDate();
    $("#txtFecha").val(strDate);            	$("#txtFecha").attr("value", strDate);
    
});

function mostrarMSG(status, msg) {
    var msgclass = "danger";
    if (status) {
         msgclass = "success";
         $('#btnPDF').show();
         $('#btnCancelar').show();  
         $('#btnConsultar').hide();   
     }
     else{

     }
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


 
$("#btnPDF").click(function () {
    var txtId = $("#txtId").val();
    //alert(txtId);

    redirect_by_post('invoice.php', {
        id: txtId
    }, true);

});

$("#btnConsultar").click(function () {

    var txtRuc = $("#txtRuc").val();
    var sltTipo = $("#sltTipo").val();
    var txtSerie = $("#txtSerie").val();
    var txtCorrelativo = $("#txtCorrelativo").val();
    var txtTotal = $("#txtTotal").val();
    var txtFecha = $("#txtFecha").val();

    var msgstatus = false;
    
    var msg = "";
    $('#btnPDF').hide();
    $('#btnXML').hide();
    $('#btnCDR').hide();
    rs_einvoice = null;

    if (txtRuc.length == "") {
        mostrarMSG(false, "¡El campo 'Ruc del Emisor' es obligatorio.!");
        $("#txtRuc").focus();
    }
    else if (txtRuc.length != 11) {
        mostrarMSG(false, "¡Error en el campo 'Ruc del Emisor', campo de 11 caracteres.!");
        $("#txtRuc").focus();
    }
    else if (txtSerie.length == "") {
        mostrarMSG(false, "¡El campo 'Serie' es obligatorio.! (Ejemplo: F001)"); 
        $("#txtSerie").focus();
    }
    else if (txtSerie.length != 4) {
        mostrarMSG(false, "¡Error en el campo 'Serie', campo de 4 caracteres.!"); 
        $("#txtSerie").focus();
    }
    else if (txtCorrelativo.length == "") {
        mostrarMSG(false, "¡El campo 'Correlativo' es obligatorio.! (Ejemplo: 00000001)"); 
        $("#txtCorrelativo").focus();
    }
    else if (txtCorrelativo.length != 8) {
        mostrarMSG(false, "¡Error en el campo 'Correlativo', campo de 8 caracteres.!"); 
        $("#txtCorrelativo").focus();
    }
    else if (txtTotal.length == "") {
        mostrarMSG(false, "¡El campo 'Total' es obligatorio.! (Ejemplo: 1250.45)"); 
        $("#txtTotal").focus();
    }
    else {       
        var data = {
			'Option': 'ConsultarComprobante',
			'_ruc': txtRuc,
			'_tipo': sltTipo,
			'_serie': txtSerie,
			'_correlativo': txtCorrelativo,
			'_total': txtTotal,
			'_fecha': txtFecha
		}
        $.ajax({
            type: "post",
            url: url,
            data: data,
            beforeSend: function () {
            },
            success: function (resultado) {   
                console.log(resultado);     
                if (resultado.length > 0) {   
                    console.log("Hi");             
                    $("#txtId").val(resultado[0].id); $("#txtId").attr("value", resultado[0].id);         
                    msgstatus = true;
                    msg="¡Documento encontrado!";
                    rs_einvoice = resultado;
                    if (resultado[0].xml != "") {
                        $('#btnXML').show();
                    }
                    if (resultado[0].cdr != "") {
                        $('#btnCDR').show();
                    }
                }
                else {
                    msgstatus = false;
                    msg="No se encontraron resultados.";
                }
                mostrarMSG(msgstatus, msg);
            },
            error: function (xhr, status) {
                console.log(xhr.responseText);
            }
        });        
    }
       
});

function redirect_by_post(purl, pparameters, in_new_tab) {
    pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
    in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

    var form = document.createElement("form");
    $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
    if (in_new_tab) {
        $(form).attr("target", "_blank");
    }
    $.each(pparameters, function(key) {
        $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
    });
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);

    return false;
}


load();
temporal();