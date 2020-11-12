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

    ?>

    <!-- <link rel="icon" href="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/<?php echo $icono["icono"]?>"> -->

    <link rel="stylesheet" href="vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/css/plugins/font-awesome.min.css">
    <script src="vistas/js/plugins/jquery.min.js" ></script>
    <script src="vistas/js/plugins/bootstrap.min.js" ></script>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="vistas/css/plantilla.css">
    <link rel="stylesheet" href="vistas/css/cabezote.css">
     
     
     
</head>
<body>
    
    <?php
    /*cabeza */
        include_once "modulos/cabezote.php";
    ?>

    <script src="vistas/js/plantilla.js" ></script> 
    <script src="vistas/js/cabezote.js" ></script>
</body>
</html>