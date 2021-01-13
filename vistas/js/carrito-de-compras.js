/* Inicio carrito*/

/* --------------------------------------------- */
/* visualizar la cesta del carrito de compras */
/* --------------------------------------------- */

if (localStorage.getItem("cantidadCesta") != null) {

    $(".cantidadCesta").html(localStorage.getItem("cantidadCesta"));
    $(".sumaCesta").html(localStorage.getItem("sumaCesta"));

} else {

    $(".cantidadCesta").html("0");
    $(".sumaCesta").html("0");

}

/* --------------------------------------------- */
/* visualizar los produtos en la pagina carrito de compras */
/* --------------------------------------------- */

if (localStorage.getItem("listaProductos") != null) {

    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));

    listaCarrito.forEach(functionForEach);

    function functionForEach(item, index) {


        $(".cuerpoCarrito").append(

            '<div clas="row itemCarrito">' +

            '<div class="col-sm-1 col-xs-12">' +

            '<br>' +

            '<button class="btn btn-default backColor quitarItemCarrito" idProducto="' + item.idProducto + '"  peso="' + item.peso + '" >' +

            '<i class="fa fa-times"></i>' +

            '</button>' +



            '</div>' +

            '<div class="col-sm-1 col-xs-12">' +

            '<figure>' +

            '<img src="' + item.imagen + '" class="img-thumbnail">' +

            '</figure>' +

            '</div>' +

            '<div class="col-sm-4 col-xs-12">' +

            '<br>' +

            '<p class="tituloCarritoCompra text-left">' + item.titulo + '</p>' +

            '</div>' +

            '<div class="col-md-2 col-sm-1 col-xs-12">' +

            '<br>' +

            '<p class="precioCarritoCompra text-center">PEN S/.<span>' + item.precio + '</span></p>' +

            '</div>' +

            '<div class="col-md-2 col-sm-3 col-xs-8">' +

            '<br>' +

            '<div class="col-xs-8" style="top:-20px">' +



            '<p class="cantidadStock text-left"  style="margin-top:-10px;margin-bottom:-10px;display:none;" stock="' + item.stock + '" >' + item.stock + '</p>' +
            /*             '<p class=" text-left"  style="margin-top:-10px;margin-bottom:-10px;font-size:10px">Productos : 10</p>' +
             */
            '<br>' +

            '<input type="number" class="form-control cantidadItem" min="1"  value="' + item.cantidad + '" tipo="' + item.tipo + '"   precio="' + item.precio + '"  idProducto="' + item.idProducto + '" >' +



            '</div>' +

            '</div>' +

            '<div class="col-md-2 col-sm-1 col-xs-4 text-center">' +

            '<br>' +

            '<p class="subTotal' + item.idProducto + ' subtotales">' +

            '<strong>PEN S/.<span>' + item.precio + '</span></strong>' +

            '</p>' +

            '</div>' +

            '</div>' +
            '<div class="clearfix"></div>' +

            '<br>'
        );

        /* evitar manipular cantidad en productos virtuales */

        $(".cantidadItem[tipo='virtual']").attr("readonly", "true");
        /*         $(".cantidadStock[tipo='virtual']").html('<p class="cantidadStock text-left"  style="margin-top:-10px;margin-bottom:-10px;display:none;" stock="' + item.stock + '"  >' + item.stock + '</p>')
         */
    }

} else {

    $(".cuerpoCarrito").html('<div class="well"style="background-color: #0d1117;">Aún no hay productos en el carrito de compras.</div>');

    $(".sumaCarrito").hide();

    $(".cabeceraCheckout").hide();

}

/* --------------------------------------------- */
/* agregar al carrito */
/* --------------------------------------------- */

$(".agregarCarrito").click(function() {

    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagen");
    var titulo = $(this).attr("titulo");
    var precio = $(this).attr("precio");
    var tipo = $(this).attr("tipo");
    var peso = $(this).attr("peso");
    var stock = $(this).attr("stock");

    var agregarAlCarrito = false;

    /* capturar detalles */

    if (tipo == "virtual") {

        agregarAlCarrito = true;

    } else {

        var seleccionarDetalle = $(".seleccionarDetalle");

        for (var i = 0; i < seleccionarDetalle.length; i++) {

            if ($(seleccionarDetalle[i]).val() == "") {

                swal({
                    title: "Debe seleccionar Talla y Color",
                    text: "",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "¡Seleccionar!",
                    closeOnConfirm: false
                })
                return;
            } else {

                titulo = titulo + "-" + $(seleccionarDetalle[i]).val();

                agregarAlCarrito = true;

            }

        }

    }

    /* ALMACENAR EN EL LOCALSTORAGE LOS PRODUCTOS AGREGADOS AL CARRITO */

    if (agregarAlCarrito) {

        /*=============================================
        RECUPERAR ALMACENAMIENTO DEL LOCALSTORAGE
        =============================================*/

        if (localStorage.getItem("listaProductos") == null) {

            listaCarrito = [];

        } else {

            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));

            for (var i = 0; i < listaProductos.length; i++) {

                if (listaProductos[i]["idProducto"] == idProducto && listaProductos[i]["tipo"] == "virtual") {

                    swal({
                        title: "El producto ya está agregado al carrito de compras",
                        text: "",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "¡Volver!",
                        closeOnConfirm: false
                    })

                    return;

                }

            }

            listaCarrito.concat(localStorage.getItem("listaProductos"));

        }

        listaCarrito.push({
            "idProducto": idProducto,
            "imagen": imagen,
            "titulo": titulo,
            "precio": precio,
            "tipo": tipo,
            "peso": peso,
            "stock": stock,
            "cantidad": "1"
        });

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

        /*=============================================
        ACTUALIZAR LA CESTA
        =============================================*/

        var cantidadCesta = Number($(".cantidadCesta").html()) + 1;
        var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);

        $(".cantidadCesta").html(cantidadCesta);
        $(".sumaCesta").html(sumaCesta);

        localStorage.setItem("cantidadCesta", cantidadCesta);
        localStorage.setItem("sumaCesta", sumaCesta);

        /*=============================================
        MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
        =============================================*/

        swal({
                title: "",
                text: "¡Se ha agregado un nuevo producto al carrito de compras!",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "¡Continuar comprando!",
                confirmButtonText: "¡Ir a mi carrito de compras!",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = rutaOculta + "carrito-de-compras";
                }
            });

    }

})

/* --------------------------------------------- */
/* quitar los produtos en la pagina carrito de compras */
/* --------------------------------------------- */

$(".quitarItemCarrito").click(function() {

    $(this).parent().parent().remove();
    /* $(this).parent().parent().parent().remove(); */

    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    var stock = $(".cuerpoCarrito .cantidadStock");

    /* si aun quedan productos volverlos agregar al carrito  */

    listaCarrito = [];

    if (idProducto.length != 0) {

        for (var i = 0; i < idProducto.length; i++) {

            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var imagenArray = $(imagen[i]).attr("src");
            var tituloArray = $(titulo[i]).html();
            var precioArray = $(precio[i]).html();
            var pesoArray = $(idProducto[i]).attr("peso");
            var tipoArray = $(cantidad[i]).attr("tipo");
            var stockArray = $(stock[i]).html();
            var cantidadArray = $(cantidad[i]).val();
            /* console.log(stockArray); */
            listaCarrito.push({
                "idProducto": idProductoArray,
                "imagen": imagenArray,
                "titulo": tituloArray,
                "precio": precioArray,
                "tipo": tipoArray,
                "peso": pesoArray,
                "stock": stockArray,
                "cantidad": cantidadArray
            });

        }

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        sumaSubtotales();
        cestaCarrito(listaCarrito.length);

    } else {

        /* ya no queda productos hay que remover todo */

        localStorage.removeItem("listaProductos");
        localStorage.setItem("cantidadCesta", "0");
        localStorage.setItem("sumaCesta", "0");

        $(".cantidadCesta").html("0");
        $(".sumaCesta").html("0");

        $(".cuerpoCarrito").html('<div class="well"style="background-color: #0d1117;">Aún no hay productos en el carrito de compras.</div>');
        $(".sumaCarrito").hide();
        $(".cabeceraCheckout").hide();

    }
})

/* --------------------------------------------- */
/* visualizar la cesta del carrito de compras */
/* --------------------------------------------- */

$(".cantidadItem").change(function() {



    var cantidad = $(this).val();
    var precio = $(this).attr("precio");
    var idProducto = $(this).attr("idProducto");
    var stock = $(this).attr("stock");


    $(".subTotal" + idProducto).html('<strong>PEN S/.<span>' + (cantidad * precio) + '</span></strong>');
    var stockArray = $(stock).html();

    /* actualizar la cantidad en el lcalstorage */

    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    var stock = $(".cuerpoCarrito .cantidadStock");


    listaCarrito = [];

    for (var i = 0; i < idProducto.length; i++) {

        var idProductoArray = $(idProducto[i]).attr("idProducto");
        var imagenArray = $(imagen[i]).attr("src");
        var tituloArray = $(titulo[i]).html();
        var precioArray = $(precio[i]).html();
        var pesoArray = $(idProducto[i]).attr("peso");
        var tipoArray = $(cantidad[i]).attr("tipo");
        var stockArray = $(stock[i]).html();
        var cantidadArray = $(cantidad[i]).val();



        listaCarrito.push({
            "idProducto": idProductoArray,
            "imagen": imagenArray,
            "titulo": tituloArray,
            "precio": precioArray,
            "tipo": tipoArray,
            "peso": pesoArray,
            "stock": stockArray,
            "cantidad": cantidadArray
        });




    }
    /* visualizamos el stock si es menor */

    for (var i = 0; i < titulo.length; i++) {

        var cantidadArray = $(cantidad[i]).val();
        var stockArray = $(stock[i]).html();



        /*  if (cantidadArray >= 11) { 
        swal({
            title: "la cantidad debe ser menor al stock " + stockArray,
            text: "",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Volver!",
            closeOnConfirm: false
        });
        */

        /*   } else if (cantidadArray <= 11) { */
        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        sumaSubtotales();
        cestaCarrito(listaCarrito.length);



        /*       } else {
                  swal({
                      title: "la cantidad debe ser menor al stock 10",
                      text: "",
                      type: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "¡Volver!",
                      closeOnConfirm: false
                  });
              } */
    }

})

/* --------------------------------------------- */
/* actualizar el subtotal */
/* --------------------------------------------- */

var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
var cantidadItem = $(".cuerpoCarrito .cantidadItem");

for (var i = 0; i < precioCarritoCompra.length; i++) {

    var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");

    $(".subTotal" + idProductoArray).html('<strong>PEN S/.<span>' + (precioCarritoCompraArray * cantidadItemArray).toFixed(2) + '</span></strong>');

    sumaSubtotales();
    cestaCarrito(precioCarritoCompra.length);

}

/* --------------------------------------------- */
/* suma de todos el subtotal */
/* --------------------------------------------- */


function sumaSubtotales() {

    var subtotales = $(".subtotales span");

    var arraySumaSubtotales = [];

    for (var i = 0; i < subtotales.length; i++) {

        var subtotalesArray = $(subtotales[i]).html();
        arraySumaSubtotales.push(Number(subtotalesArray));

    }

    function sumaArraySubtotales(total, numero) {

        return total + numero;

    }


    var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales, 0);


    $(".sumaSubTotal").html('<strong>PEN S/.<span>' + (sumaTotal).toFixed(2) + '</span></strong>');

    $(".sumaCesta").html((sumaTotal).toFixed(2));

    localStorage.setItem("sumaCesta", (sumaTotal).toFixed(2));



}
/* --------------------------------------------- */
/* actualizar cesta al cambiar cantidad */
/* --------------------------------------------- */

function cestaCarrito(cantidadProductos) {

    /*    SI HAY PRODUCTOS EN EL CARRITO   */

    if (cantidadProductos != 0) {

        var cantidadItem = $(".cuerpoCarrito .cantidadItem");

        var arraySumaCantidades = [];

        for (var i = 0; i < cantidadItem.length; i++) {

            var cantidadItemArray = $(cantidadItem[i]).val();
            arraySumaCantidades.push(Number(cantidadItemArray));

        }

        function sumaArrayCantidades(total, numero) {

            return total + numero;

        }

        var sumaTotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);

        $(".cantidadCesta").html(sumaTotalCantidades);
        localStorage.setItem("cantidadCesta", sumaTotalCantidades);

    }

}

/* --------------------------------------------- */
/* cheacaut de carrito de compras */
/* --------------------------------------------- */

$("#btnCheckout").click(function() {

    $(".listaProductos table.tablaProductos tbody").html("");

    $("#checkPaypal").prop("checked", true);
    $("#checkPayu").prop("checked", false);

    var idUsuario = $(this).attr("idUsuario");
    var peso = $(".cuerpoCarrito button, .comprarAhora button");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra, .comprarAhora .tituloCarritoCompra");
    var cantidad = $(".cuerpoCarrito .cantidadItem, .comprarAhora .cantidadItem");
    var subtotal = $(".cuerpoCarrito .subtotales span, .comprarAhora .subtotales span");
    var stock = $(".cuerpoCarrito .cantidadStock");
    var tipoArray = [];
    var cantidadPeso = [];

    /* suma subtotal */

    var sumaSubTotal = $(".sumaSubTotal span");
    $(".valorSubtotal").html($(sumaSubTotal).html());
    $(".valorSubtotal").attr("valor", $(sumaSubTotal).html());

    /* impuesto tasa */

    var impuestoTotal = ($(".valorSubtotal").html() * $("#tasaImpuesto").val()) / 100;

    $(".valorTotalImpuesto").html((impuestoTotal).toFixed(2));
    $(".valorTotalImpuesto").attr("valor", (impuestoTotal).toFixed(2));

    sumaTotalCompra();

    /* variables array */

    for (var i = 0; i < titulo.length; i++) {

        var pesoArray = $(peso[i]).attr("peso");
        var tituloArray = $(titulo[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        var subtotalArray = $(subtotal[i]).html();
        /* var stockArray = $(stock[i]).attr("stock"); */
        var stockArray = $(stock[i]).html();

        /* validamos el stock */

        /*       if (cantidadArray >= 11) {
                  $("#btnCheckout").html('<div id="modalCheckout" class="modal fade modalFormulario" role="dialog" style="display:none" >	</div>');
                  swal({
                      title: "la cantidad debe ser menor al stock 11",
                      text: "",
                      type: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "¡Volver!",
                      closeOnConfirm: false
                  }, function(isConfirm) {
                      if (isConfirm) {
                          window.location = localStorage.getItem("rutaActual");
                      }
                  });


              } else { */

        /* evaluar el peso de acuerdo a la cantidad de productos */

        cantidadPeso[i] = pesoArray * cantidadArray;

        function sumaArrayPeso(total, numero) {

            return total + numero;

        }

        var sumaTotalPeso = cantidadPeso.reduce(sumaArrayPeso);


        /* MOstrar productos definitivos */
        $(".listaProductos table.tablaProductos tbody").append('<tr style="color:black">' +
            '<td style="color:black" class="valorTitulo">' + tituloArray + '</td>' +
            '<td style="color:black" class="valorCantidad">' + cantidadArray + '</td>' +
            '<td style="color:black"><span style="color:black" class="cambioDivisa">PEN</span> S/. <span style="color:black" class="valorItem" valor="' + subtotalArray + '"> ' + subtotalArray + '</span></td>' +
            '</tr>');

        /* seleccionar region de envio si el preoducto es fisico */

        tipoArray.push($(cantidad[i]).attr("tipo"));

        function checkTipo(tipo) {

            return tipo == "fisico";

        }
    }
    /* existen productos fisicos */

    if (tipoArray.find(checkTipo) == "fisico") {

        /* validamos seleccion region */

        $(".seleccionePais").html('<select class="form-control" id="seleccionarPais" required>' +
            '<option value="" style="color:black">Seleccione la region</option>' +
            '</select>');

        $(".formEnvio").show();
        $(".btnPagar").attr("tipo", "fisico");

        /* validamos seleccion region fin */

        $.ajax({
            url: rutaOculta + "vistas/js/plugins/departamentos.json",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {

                respuesta.forEach(seleccionarPais);

                function seleccionarPais(item, index) {

                    var pais = item.name;
                    var codPais = item.code;
                    $("#seleccionarPais").append('<option style="color:black" value="' + codPais + '">' + pais + '</option>');
                }

            }
        })

        /* --------------------------------------------- */
        /* evaluar  tasa de envio si es producto fisico*/
        /* --------------------------------------------- */

        $("#seleccionarPais").change(function() {

            $(".alert").remove();


            var region = $(this).val();
            var tasaRegion = $("#tasaRegion").val();

            if (region == tasaRegion) {

                var resultadoPeso = sumaTotalPeso * $("#envioLocal").val();

                if (resultadoPeso < $("#tasaMinimaLocal").val()) {

                    $(".valorTotalEnvio").html($("#tasaMinimaLocal").val());
                    $(".valorTotalEnvio").attr("valor", $("#tasaMinimaLocal").val());

                } else {

                    $(".valorTotalEnvio").html(resultadoPeso);
                    $(".valorTotalEnvio").attr("valor", resultadoPeso);
                }

            } else {

                var resultadoPeso = sumaTotalPeso * $("#envioNacional").val();

                if (resultadoPeso < $("#tasaMinimaNacional").val()) {

                    $(".valorTotalEnvio").html($("#tasaMinimaNacional").val());
                    $(".valorTotalEnvio").attr("valor", $("#tasaMinimaNacional").val());

                } else {

                    $(".valorTotalEnvio").html(resultadoPeso);
                    $(".valorTotalEnvio").attr("valor", resultadoPeso);
                }

            }


            sumaTotalCompra();

        })

    } else {
        $(".btnPagar").attr("tipo", "virtual");

    }

    /* } */



})

/* --------------------------------------------- */
/* Suma total definitivo*/
/* --------------------------------------------- */

function sumaTotalCompra() {

    var sumaTotalTasas = Number($(".valorSubtotal").html()) +
        Number($(".valorTotalEnvio").html()) +
        Number($(".valorTotalImpuesto").html());


    $(".valorTotalCompra").html((sumaTotalTasas).toFixed(2));
    $(".valorTotalCompra").attr("valor", (sumaTotalTasas).toFixed(2));

    /*     localStorage.setItem("total", hex_md5($(".valorTotalCompra").html()));
     */
}
/* --------------------------------------------- */
/* MÉTODO DE PAGO PARA CAMBIO DE DIVISA*/
/* --------------------------------------------- */

var metodoPago = "paypal";
divisas(metodoPago);

$("input[name='pago']").change(function() {

    var metodoPago = $(this).val();

    divisas(metodoPago);

    /* if (metodoPago == "payu") {

        $(".btnPagar").hide();
        $(".formPayu").show();

        pagarConPayu();

    } else {

        $(".btnPagar").show();
        $(".formPayu").hide();

    } */

})

/* --------------------------------------------- */
/* FUNCIÓN PARA EL CAMBIO DE DIVISA*/
/* --------------------------------------------- */


function divisas(metodoPago) {

    $("#cambiarDivisa").html("");

    if (metodoPago == "paypal") {

        $("#cambiarDivisa").append('<option value="PEN" style="color:black">PEN</option>' +
                '<option value="USD" style="color:black">USD</option>')
            /*+
                      '<option value="EUR" style="color:black">EUR</option>' +
                       '<option value="GBP" style="color:black">GBP</option>' +
                       '<option value="MXN" style="color:black">MXN</option>' +
                       '<option value="JPY" style="color:black">JPY</option>' +
                       '<option value="CAD" style="color:black">CAD</option>' +
                       '<option value="BRL" style="color:black">BRL</option>') */

    } else {

        $("#cambiarDivisa").append('<option value="PEN" style="color:black">PEN</option>' +
                '<option value="USD" style="color:black">USD</option>')
            /* +
                        '<option value="COP" style="color:black">COP</option>' +
                        '<option value="MXN" style="color:black">MXN</option>' +
                        '<option value="CLP" style="color:black">CLP</option>' +
                        '<option value="ARS" style="color:black">ARS</option>' +
                        '<option value="BRL" style="color:black">BRL</option>')*/

    }

}

/* --------------------------------------------- */
/* cambio divisisa/
/* --------------------------------------------- */

var divisaBase = "PEN";
/* var disisaconvresion = "USD"
 */
$("#cambiarDivisa").change(function() {

    $(".alert").remove();

    if ($("#seleccionarPais").val() == "") {

        $("#cambiarDivisa").after('<div class="alert alert-warning">No ha seleccionado la region de envío</div>');

        return;
    }

    var divisa = $(this).val();

    $.ajax({
        /*  https://free.currconv.com/api/v7/convert?q=PEN_USD&compact=ultra&apiKey=adb79720d66aeb836f75 */
        url: "https://free.currconv.com/api/v7/convert?q=" + divisaBase + "_" + divisa + "&compact=ultra&apiKey=adb79720d66aeb836f75",
        type: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "jsonp",
        success: function(respuesta) {

            var conversion = (respuesta["PEN_" + divisa]).toFixed(2);
            $(".cambioDivisa").html(divisa);


            if (divisa == "PEN") {

                $(".valorSubtotal").html($(".valorSubtotal").attr("valor"))
                $(".valorTotalEnvio").html($(".valorTotalEnvio").attr("valor"))
                $(".valorTotalImpuesto").html($(".valorTotalImpuesto").attr("valor"))
                $(".valorTotalCompra").html($(".valorTotalCompra").attr("valor"))

                var valorItem = $(".valorItem");

                /* localStorage.setItem("total", hex_md5($(".valorTotalCompra").html())); */

                for (var i = 0; i < valorItem.length; i++) {

                    $(valorItem[i]).html($(valorItem[i]).attr("valor"));

                }
            } else {

                $(".valorSubtotal").html(

                    Math.ceil(Number(conversion) * Number($(".valorSubtotal").attr("valor")) * 100) / 100

                )

                $(".valorTotalEnvio").html(

                    (Number(conversion) * Number($(".valorTotalEnvio").attr("valor"))).toFixed(2)

                )

                $(".valorTotalImpuesto").html(

                    (Number(conversion) * Number($(".valorTotalImpuesto").attr("valor"))).toFixed(2)

                )

                $(".valorTotalCompra").html(

                    (Number(conversion) * Number($(".valorTotalCompra").attr("valor"))).toFixed(2)

                )

                var valorItem = $(".valorItem");

                /*                     localStorage.setItem("total", hex_md5($(".valorTotalCompra").html()));
                 */
                for (var i = 0; i < valorItem.length; i++) {

                    $(valorItem[i]).html(

                        (Number(conversion) * Number($(valorItem[i]).attr("valor"))).toFixed(2)

                    );

                }

            }

            /*  $(".cambioDivisa").html(divisa);

             var sub = $(".valorSubtotal").html((Number(conversion) * Number($(".valorSubtotal").attr("valor"))).toFixed(2));
             $(".valorTotalEnvio").html((Number(conversion) * Number($(".valorTotalEnvio").attr("valor"))).toFixed(2));
             $(".valorTotalImpuesto").html((Number(conversion) * Number($(".valorTotalImpuesto").attr("valor"))).toFixed(2));
             $(".valorTotalCompra").html((Number(conversion) * Number($(".valorTotalCompra").attr("valor"))).toFixed(2));

             var valorItem = $(".valorItem");

             for (var i = 0; i < valorItem.length; i++) {

                 $(valorItem[i]).html((Number(conversion) * Number($(valorItem[i]).attr("valor"))).toFixed(2));

             } */

        }

    })



})

/* --------------------------------------------- */
/* pagar boton*/
/* --------------------------------------------- */

$(".btnPagar").click(function() {

    var tipo = $(this).attr("tipo");

    if (tipo == "fisico" && $("#seleccionarPais").val() == "") {

        $(".btnPagar").after('<br><div class="alert alert-warning">No ha seleccionado la region de envío</div>');

        return;
    }

    var divisa = $("#cambiarDivisa").val();
    var total = $(".valorTotalCompra").html();
    /* var totalEncriptado = localStorage.getItem("total"); */
    var impuesto = $(".valorTotalImpuesto").html();
    var envio = $(".valorTotalEnvio").html();
    var subtotal = $(".valorSubtotal").html();
    var titulo = $(".valorTitulo");
    var cantidad = $(".valorCantidad");
    var valorItem = $(".valorItem");
    var idProducto = $('.cuerpoCarrito button, .comprarAhora button');

    var tituloArray = [];
    var cantidadArray = [];
    var valorItemArray = [];
    var idProductoArray = [];


    for (var i = 0; i < titulo.length; i++) {

        tituloArray[i] = $(titulo[i]).html();
        cantidadArray[i] = $(cantidad[i]).html();
        valorItemArray[i] = $(valorItem[i]).html();
        idProductoArray[i] = $(idProducto[i]).attr("idProducto");
        /* console.log(tituloArray[i]); */

    }

    var datos = new FormData();

    datos.append("divisa", divisa);
    datos.append("total", total);
    /*     datos.append("totalEncriptado", totalEncriptado);*/
    datos.append("impuesto", impuesto);
    datos.append("envio", envio);
    datos.append("subtotal", subtotal);
    datos.append("tituloArray", tituloArray);
    datos.append("cantidadArray", cantidadArray);
    datos.append("valorItemArray", valorItemArray);
    datos.append("idProductoArray", idProductoArray);

    $.ajax({
        url: rutaOculta + "ajax/carrito.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            /*  window.location = respuesta;
             */
            location = (respuesta);
            console.log(respuesta);


        }

    })

})



/* Fin carrito */