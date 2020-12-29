<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, 
    maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="Tienda Virtual">
    <meta name="description" content="Sistema de Ventas con pasarelas de pago de compra de ropas ">
    <meta name="keyword" content="tienda virtual, ropa,moda,bariados">
    <title>Sistema Tienda</title>
    
    <?php 

        session_start();

		$servidor = Ruta::ctrRutaServidor();

        $icono=ControladorPlantilla::ctrEstiloPlantilla();
        //hay dos formas de poner una es por el siguiente y el otro es el de abajo
		echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';

        $url= Ruta::ctrRuta();
        
        
        
    ?>

    <!-- <link rel="icon" href="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/< ?php echo $icono["icono"]?>"> -->
    
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/flexslider.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/sweetalert.css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 


    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/slide.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/productos.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/infoproducto.css">

    

    <script src="<? echo $url;?>vistas/js/plugins/jquery.min.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/bootstrap.min.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.easing.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.scrollUp.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.flexslider.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/sweetalert.min.js" ></script>

    
    
</head>
<body>
    
    <?php
    /*cabeza */
    include_once "modulos/cabezote.php";
/*     include_once 'modulos/navegacion.php';
 */
    $rutas=array();
    $ruta=null;    
    $infoProducto=null;
    
        if (isset($_GET["ruta"])) {            
            $rutas=explode("/",$_GET["ruta"]);
            $item="ruta";
            $valor=$rutas[0];

            $rutaCategorias=ControladorProductos::ctrMostrarCategorias($item,$valor);
            if(is_array($rutaCategorias) && $rutas[0] == $rutaCategorias["ruta"]){
                $ruta=$rutas[0];
            }

          
            $rutaSubCategorias=ControladorProductos::ctrMostrarSubCategorias($item,$valor);
                foreach ($rutaSubCategorias as $key => $value) {
                    if($rutas[0] == $value["ruta"]){
                        $ruta=$rutas[0];
                    }
                }
            $rutaProductos=ControladorProductos::ctrMostrarInfoProducto($item,$valor);
            if(is_array($rutaProductos) && $rutas[0] == $rutaProductos["ruta"]){
                $infoProducto=$rutas[0];
            }

            if ($ruta!=null || $rutas[0]=="articulos-gratis"|| $rutas[0]=="lo-mas-vendidos"|| $rutas[0]=="lo-mas-visto"|| $rutas[0]=="articulos-oferta") {
           
                include 'modulos/productos.php';
                
            }
            else if ($infoProducto != null) {

                include "modulos/infoproducto.php";

            }
            else if ($rutas[0] == "buscador" || $rutas[0] == "verificar" || $rutas[0]=="salir" || $rutas[0]=="perfil" ) {

                include "modulos/".$rutas[0].".php";


            }
            
            
            else{
                include 'modulos/error404.php';

            }
        }else{
            include 'modulos/slide.php';
            include 'modulos/destacados.php';

        }
    ?>

    <input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
   
    <script src="<? echo $url; ?>vistas/js/cabezote.js" ></script>
    <script src="<? echo $url; ?>vistas/js/plantilla.js" ></script> 
    <script src="<? echo $url; ?>vistas/js/slide.js" ></script>
    <script src="<? echo $url; ?>vistas/js/buscador.js" ></script>
    <script src="<? echo $url; ?>vistas/js/infoproducto.js" ></script>
    <script src="<? echo $url; ?>vistas/js/usuarios.js" ></script>
    <script src="<? echo $url; ?>vistas/js/registroFacebook.js" ></script>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '2728192714101906',
          cookie     : true,
          xfbml      : true,
          version    : 'v9.0'
        });

        FB.AppEvents.logPageView();   

      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>