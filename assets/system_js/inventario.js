var url = $("#rutaclases").val() + "clsItem.php";
var rsInventario = [];


function inventario() {
    var Data = {
        'Option': 'inventario'
    }
    $.ajax({
        type: "post",
        url: url,
        data: Data,
        beforeSend: function () { },
        success: function (resultado) {
            console.log(resultado);
            if (resultado.length > 0) {
                rsInventario = resultado;
                var trd = "";
                for (var i = 0; i < resultado.length; i++) {
                    var dias = resultado[i].dias;
                    var span = `<span class="status-p bg-success">` + dias + ` dias</span>`;
                    if (dias <= 5) {
                        span = `<span class="status-p bg-danger">` + dias + ` dias</span>`;
                    }
                    if (dias > 5 && dias <= 30) {
                        span = `<span class="status-p bg-warning">` + dias + ` dias</span>`;
                    }

                    trd += `
                    <tr>
                        <th scope="row">`+ resultado[i].descripcion + `</th>
                        <th>`+ resultado[i].tipo + `</th>
                        <td scope="row">`+ resultado[i].nombre + `</td>
                        <td>`+ resultado[i].cantidad + `</td>
                        <td>`+ resultado[i].fecha_vencimiento + `</td>
                        <td>`+ resultado[i].estado + `</td>
                        <td>`+ span + `</td>
                    `;
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


function PaginacionTabla() {
    var $table = $('table');
    var currentPage = 0;// El valor predeterminado de la página actual es 0  
    var pageSize = 10;// Número que se muestra en cada página  
    $table.bind('paging', function () {
        $table.find('tbody tr').hide().slice(currentPage * pageSize, (currentPage + 1) * pageSize).show();
    });
    var sumRows = $table.find('tbody tr').length;
    var sumPages = Math.ceil(sumRows / pageSize);//paginas totales    

    var $pager = $('#divpager'); //= $('<div class="page"></div>');  // Crea un nuevo div, coloca una etiqueta, muestra el número de página inferior  
    $("#divpager").html("");
    for (var pageIndex = 0; pageIndex < sumPages; pageIndex++) {
        $('<a href="#" style:"" id="pageStyle" onclick="changCss(this)" class="paginate_button"><span>' + (pageIndex + 1) + '</span></a>').bind("click", { "newPage": pageIndex }, function (event) {
            currentPage = event.data["newPage"];
            $table.trigger("paging");
            // Activar la función de paginación  
        }).appendTo($pager);
        $pager.append(" ");
    }
    $pager.insertAfter($table);
    $table.trigger("paging");
    // El efecto predeterminado de una etiqueta en la primera página  
    var $pagess = $('#pageStyle');
    $pagess[0].style.backgroundColor = "#3C8DBC";
    $pagess[0].style.color = "#ffffff";
}

function changCss(obj) {
    var arr = document.getElementsByTagName("a");
    for (var i = 0; i < arr.length; i++) {
        if (obj == arr[i]) {       // Estilo de página actual  
            obj.style.backgroundColor = "#3C8DBC";
            obj.style.color = "#ffffff";
        }
        else {
            arr[i].style.color = "";
            arr[i].style.backgroundColor = "";
        }
    }
}
function coincidencias() {
    var trd = "";
    for (i = 0; i < rsInventario.length; i++) {
        var search = ($("#searchdata").val()).toUpperCase();
        //console.log(search);
        var descripcion = (rsInventario[i].descripcion).toUpperCase().toString().split(search.toString());
        var tipo = (rsInventario[i].tipo).toUpperCase().toString().split(search.toString());
        var nombre = (rsInventario[i].nombre).toUpperCase().toString().split(search.toString());
        if (descripcion.length > 1 || tipo.length > 1 || nombre.length > 1) {
            var dias = rsInventario[i].dias;
            var span = `<span class="status-p bg-success">` + dias + ` dias</span>`;
            if (dias <= 5) {
                span = `<span class="status-p bg-danger">` + dias + ` dias</span>`;
            }
            if (dias > 5 && dias <= 30) {
                span = `<span class="status-p bg-warning">` + dias + ` dias</span>`;
            }
            trd += `
                    <tr>
                        <th scope="row">`+ rsInventario[i].descripcion + `</th>
                        <th>`+ rsInventario[i].tipo + `</th>
                        <td scope="row">`+ rsInventario[i].nombre + `</td>
                        <td>`+ rsInventario[i].cantidad + `</td>
                        <td>`+ rsInventario[i].fecha_vencimiento + `</td>
                        <td>`+ rsInventario[i].estado + `</td>
                        <td>`+ span + `</td>
                    `;
        }
    }
    $("#bodytblReporte").html(trd);
    PaginacionTabla();
}


$("#searchdata").keyup(function () {
    coincidencias();
})

inventario();