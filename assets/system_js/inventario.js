var url = $("#rutaclases").val() + "clsItem.php";
var rsInventario = [];


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
            if (resultado.length > 0) {
                rsVentas = resultado;
                var trd = "";
                for (var i = 0; i < resultado.length; i++) {
                    trd += `
                    <tr>
                        <th scope="row">`+ resultado[i].local_codigo + `</th>
                        <th scope="row">`+ resultado[i].fecha + `</th>
                        <td>`+ resultado[i].tipo_comprobante + `</td>
                        <td>`+ resultado[i].forma_pago + `</td>
                        <td>`+ resultado[i].nro_documento + `</td>
                        <td>`+ resultado[i].nro_doc_cliente + `</td>
                        <td>`+ resultado[i].cliente + `</td>
                        <td>`+ resultado[i].efectivo + `</td>
                        <td>`+ resultado[i].tarjeta + `</td>
                        <td>`+ resultado[i].otro_medio_pago + `</td>
                        <td>`+ resultado[i].documento_afectado + `</td>
                        <td>`+ resultado[i].op_grabada + `</td>
                        <td>`+ resultado[i].op_inafecta + `</td>
                        <td>`+ resultado[i].op_exoneradas + `</td>
                        <td>`+ resultado[i].igv + `</td>
                        <td>`+ resultado[i].total + `</td>
                        <td>`+ resultado[i].costo + `</td>
                        <td>`+ resultado[i].ganancia + `</td>
                        <td>
                            <ul class="d-flex justify-content-center" data-toggle="modal" data-target="#modalreporte">
                                <li class="mr-3"><a href="#" class="text-secondary"><i
                                            class="fa fa-edit"></i> PDF</a></li>
                                </li>
                                <li class="mr-3"><a href="#" class="text-secondary"><i
                                            class="fa fa-edit"></i> XML</a></li>
                                </li>
                                            <li class="mr-3"><a href="#" class="text-secondary"><i
                                            class="fa fa-edit"></i> CDR</a></li>
                                </li>
                            </ul>
                        </td>
                    </tr>`;
                }
                $("#bodytblReporte").html(trd);
                PaginacionTabla();
            }
            else {
            }
        },
        error: function (xhr, status) {
            console.log(xhr);
        },
        complete: function (xhr, status) {
        }
    });
}