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

            '<p class="precioCarritoCompra text-center">SOL S/.<span>' + item.precio + '</span></p>' +

            '</div>' +

            '<div class="col-md-2 col-sm-3 col-xs-8">' +

            '<br>' +

            '<div class="col-xs-8" style="top:-20px">' +



            '<p class="cantidadStock text-left"  style="margin-top:-10px;margin-bottom:-10px;display:none;" stock="' + item.stock + '" >' + item.stock + '</p>' +

            '<br>' +

            '<input type="number" class="form-control cantidadItem" min="1" max="' + item.stock + '" value="' + item.cantidad + '" tipo="' + item.tipo + '"   precio="' + item.precio + '"  idProducto="' + item.idProducto + '" >' +



            '</div>' +

            '</div>' +

            '<div class="col-md-2 col-sm-1 col-xs-4 text-center">' +

            '<br>' +

            '<p class="subTotal' + item.idProducto + ' subtotales">' +

            '<strong>SOL S/.<span>' + item.precio + '</span></strong>' +

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

            } else {

                titulo = titulo + "-" + $(seleccionarDetalle[i]).val();

                agregarAlCarrito = true;

            }

        }

    }

    /* ALMACENAR EN EL LOCALSTORAGE LOS PRODUCTOS AGREGADOS AL CARRITO */

    if (agregarAlCarrito) {

        /* recuperar almacenamiento del localstorage */

        if (localStorage.getItem("listaProductos") == null) {

            listaCarrito = [];

        } else {

            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));

            for (var i = 0; i < listaProductos.length; i++) {

                /* mostrar ya agrgados */

                if (listaProductos[i]["idProducto"] == idProducto || listaProductos[i]["tipo"] == "virtual") {

                    swal({
                            title: "El producto ya está agregado al carrito de compras si desea cambiar de talla o color elimine primero el producto",
                            text: "",
                            type: "warning",
                            showCancelButton: false,
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

        /* Actualizar cesta*/

        var cantidadCesta = Number($(".cantidadCesta").html()) + 1;
        var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);

        $(".cantidadCesta").html(cantidadCesta);
        $(".sumaCesta").html(sumaCesta);

        localStorage.setItem("cantidadCesta", cantidadCesta);
        localStorage.setItem("sumaCesta", sumaCesta);


        /* mostrar alerta de que el  producto ya fue agregado */

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


    $(".subTotal" + idProducto).html('<strong>SOL S/.<span>' + (cantidad * precio) + '</span></strong>');
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
    if (cantidadArray >= stockArray) {
        swal({
            title: "la cantidad debe ser menor al stock " + stockArray,
            text: "",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Volver!",
            closeOnConfirm: false
        });
        /*  localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
         sumaSubtotales();
         cestaCarrito(listaCarrito.length); */

    } else {
        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        sumaSubtotales();
        cestaCarrito(listaCarrito.length);



    }





})

/* --------------------------------------------- */
/* actualizar el subtotal */
/* --------------------------------------------- */

var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
var cantidadItem = $(".cuerpoCarrito .cantidadItem");

for (let i = 0; i < precioCarritoCompra.length; i++) {

    var precioCarritoCompraArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");

    $(".subTotal" + idProductoArray).html('<strong>SOL S/.<span>' + (precioCarritoCompraArray * cantidadItemArray) + '</span></strong>');

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


    $(".sumaSubTotal").html('<strong>SOL S/.<span>' + (sumaTotal).toFixed(2) + '</span></strong>');

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


/* Fin carrito */