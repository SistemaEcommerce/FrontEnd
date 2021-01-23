<?php

//https://www.browserling.com/tools/random-ip

//$ip = $_SERVER['REMOTE_ADDR'];

$ip = "181.233.197.19";
/* $ip = "153.205.198.22"; */

//http://www.geoplugin.net/

$informacionPais = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);

$datosPais = json_decode($informacionPais);

/* $pais = $datosPais->geoplugin_region;*/
/* $pais = $datosPais->countryName; */
$pais = $datosPais->geoplugin_countryName;

$enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais);

$totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();


?>
<div class="container-fluid  productos" style="background-color: #0d1117;border:0px;padding-top:15px;">
    <div class="container">
        <div class="row">


            <ul class="breadcrumb fondoBreadcrumb  text-uppercase lead" style="background-color:#0d1117;padding-top:0px;padding-bottom:0px;border:none;top:-30px;margin-bottom:0px;font-size:25px;">

                <h2 class="pull-right"><small>Tu eres nuestro visitante # <?php echo $totalVisitas["total"]; ?></small></h2>


            </ul>


        </div>
    </div>
</div>

<!-- modulo visitantes
 -->

<div class="container-fluid">

    <div class="container">

        <div class="row">

            <?php

            $paises = ControladorVisitas::ctrMostrarPaises();

            $coloresPaises = array("#09F", "#900", "#059", "#260", "#F09", "#02A");

            $indice = -1;

            foreach ($paises as $key => $value) {

                $promedio = $value["cantidad"] * 100 / $totalVisitas["total"];

                $indice++;

                echo '<div class="col-md-2 col-sm-4 col-xs-12 text-center">
        
                        <h2 class="text-muted">' . $value["pais"] . '</h2>

                        <input type="text" class="knob" value="' . round($promedio) . '" data-width="90" data-height="90" data-fgcolor="' . $coloresPaises[$indice] . '" data-readonly="true">

                        <p class="text-muted text-center" style="font-size:12px"> ' . round($promedio) . '% de las visitas</p>

             </div>';
            }


            ?>
        </div>

    </div>

</div>