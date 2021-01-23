<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0, user-scalable=no">


    <?php

    session_start();

    $servidor = Ruta::ctrRutaServidor();

    $icono = ControladorPlantilla::ctrEstiloPlantilla();
    //hay dos formas de poner una es por el siguiente y el otro es el de abajo
    echo '<link rel="icon" href="' . $servidor . $icono["icono"] . '">';

    $url = Ruta::ctrRuta();

    /* marcado de cabeceras opengrafht */

    $rutas = array();

    if (isset($_GET["ruta"])) {

        $rutas = explode("/", $_GET["ruta"]);

        $ruta = $rutas[0];
    } else {

        $ruta = "inicio";
    }

    $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
    if (!is_array($cabeceras)) {

        /*         if (!$cabeceras["ruta"]) {
 */
        $ruta = "inicio";

        $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
        /* } */
    }

    /* var_dump($cabeceras); */

    ?>

    <!-- marcado html5 -->

    <meta name="title" content="<?php echo  $cabeceras['titulo']; ?>">

    <meta name="description" content="<?php echo  $cabeceras['descripcion']; ?>">

    <meta name="keyword" content="<?php echo  $cabeceras['palabrasClaves']; ?>">

    <title><?php echo  $cabeceras['titulo']; ?></title>

    <!-- marcodo open graph de facebook -->

    <meta property="og:title" content="<?php echo $cabeceras['titulo']; ?>">
    <meta property="og:url" content="<?php echo $url . $cabeceras['ruta']; ?>">
    <meta property="og:description" content="<?php echo $cabeceras['descripcion']; ?>">
    <meta property="og:image" content="<?php echo $cabeceras['portada']; ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Tienda Virtual">
    <meta property="og:locale" content="es_PE">

    <!-- marcado open graph de google -->

    <meta itemprop="name" content="<?php echo $cabeceras['titulo']; ?>">
    <meta itemprop="url" content="<?php echo $url . $cabeceras['ruta']; ?>">
    <meta itemprop="description" content="<?php echo $cabeceras['descripcion']; ?>">
    <meta itemprop="image" content="<?php echo $cabeceras['portada']; ?>">

    <!-- twiter -->

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $cabeceras['titulo']; ?>">
    <meta name="twitter:url" content="<?php echo $url . $cabeceras['ruta']; ?>">
    <meta name="twitter:description" content="<?php echo $cabeceras['descripcion']; ?>">
    <meta name="twitter:image" content="<?php echo $cabeceras['portada']; ?>">
    <meta name="twitter:site" content="@tu-usuario">

    <!-- plantillas css -->

    <!-- <link rel="icon" href="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/< ?php echo $icono["icono"]?>"> -->

    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/flexslider.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/sweetalert.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/dscountdown.css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/slide.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/productos.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/infoproducto.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/perfil.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/carrito-de-compra.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/style-starter.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/ofertas.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/footer.css">


    <script src="<? echo $url;?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/bootstrap.min.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.easing.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.scrollUp.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.flexslider.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/sweetalert.min.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/md5-min.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/dscountdown.min.js"></script>
    <script src="<? echo $url;?>vistas/js/plugins/knob.jquery.js"></script>

    

</head>

<body>

    <?php
    /*cabeza */
    include_once "modulos/cabezote.php";
    /*     include_once 'modulos/navegacion.php';
 */
    $rutas = array();
    $ruta = null;
    $infoProducto = null;

    if (isset($_GET["ruta"])) {
        $rutas = explode("/", $_GET["ruta"]);
        $item = "ruta";
        $valor = $rutas[0];

        $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
        if (is_array($rutaCategorias) && $rutas[0] == $rutaCategorias["ruta"]) {
            $ruta = $rutas[0];
        }


        $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
        foreach ($rutaSubCategorias as $key => $value) {
            if ($rutas[0] == $value["ruta"]) {
                $ruta = $rutas[0];
            }
        }
        $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
        if (is_array($rutaProductos) && $rutas[0] == $rutaProductos["ruta"]) {
            $infoProducto = $rutas[0];
        }

        if ($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendidos" || $rutas[0] == "lo-mas-visto" || $rutas[0] == "articulos-oferta") {

            include 'modulos/productos.php';
        } else if ($infoProducto != null) {

            include "modulos/infoproducto.php";
        } else if (
            $rutas[0] == "buscador" || $rutas[0] == "verificar"
            || $rutas[0] == "salir" || $rutas[0] == "perfil" || $rutas[0] == "ofertas"
            || $rutas[0] == "carrito-de-compras" || $rutas[0] == "error" || $rutas[0] == "finalizar-compra" || $rutas[0] == "curso" || $rutas[0] == "contactanos"
        ) {

            include "modulos/" . $rutas[0] . ".php";

        } else if ($rutas[0] == "inicio") {
            include 'modulos/slide.php';
            include 'modulos/destacados.php';
        } else {
            include 'modulos/error404.php';
        }
    } else {
        include 'modulos/slide.php';
        include 'modulos/destacados.php';
        include 'modulos/visitas.php';
        include 'modulos/footer.php';
    }
    ?>

    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

    <script src="<? echo $url; ?>vistas/js/cabezote.js"></script>
    <script src="<? echo $url; ?>vistas/js/plantilla.js"></script>
    <script src="<? echo $url; ?>vistas/js/slide.js"></script>
    <script src="<? echo $url; ?>vistas/js/buscador.js"></script>
    <script src="<? echo $url; ?>vistas/js/infoproducto.js"></script>
    <script src="<? echo $url; ?>vistas/js/usuarios.js"></script>
    <script src="<? echo $url; ?>vistas/js/registroFacebook.js"></script>
    <script src="<? echo $url; ?>vistas/js/carrito-de-compras.js"></script>
    <script src="<? echo $url; ?>vistas/js/visitas.js"></script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '2728192714101906',
                cookie: true,
                xfbml: true,
                version: 'v9.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        /* compartir en facebook  	https://developers.facebook.com/docs/      
         */
        $(".btnFacebook").click(function() {

            FB.ui({

                method: 'share',
                display: 'popup',
                href: '<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  ?>',
            }, function(response) {});

        })

        /* compartir en google  	https://developers.google.com/+/web/share/   */

        $(".btnGoogle").click(function() {

            window.open(

                'https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  ?>',
                '',
                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=400'
            );

            return false;

        })
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '420721902588312');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=420721902588312&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129023276-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-129023276-1');
    </script>

</body>

</html>