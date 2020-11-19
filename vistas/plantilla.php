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

        $icono=ControladorPlantilla::ctrEstiloPlantilla();
        //hay dos formas de poner una es por el siguiente y el otro es el de abajo
        echo'<link rel="icon" href="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/'.$icono["icono"].'">' ;

        $url= Ruta::ctrRuta();
        
        
        
    ?>

    <!-- <link rel="icon" href="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/< ?php echo $icono["icono"]?>"> -->

    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <script src="<? echo $url;?>vistas/js/plugins/jquery.min.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/bootstrap.min.js" ></script>
    <script src="<? echo $url;?>vistas/js/plugins/jquery.easing.js" ></script>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<? echo $url; ?>vistas/css/slide.css">
     
     
</head>
<body>
    
    <?php
    /*cabeza */
    include_once "modulos/cabezote.php";

    $rutas=array();
    $ruta=null;
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

            if ($ruta!=null) {
                include 'modulos/productos.php';
            }else{
                include 'modulos/error404.php';

            }
        }else{
            include 'modulos/slide.php';

        }
    ?>

    <script src="<? echo $url; ?>vistas/js/plantilla.js" ></script> 
    <script src="<? echo $url; ?>vistas/js/cabezote.js" ></script>
    <script src="<? echo $url; ?>vistas/js/slide.js" ></script>


</body>
</html>