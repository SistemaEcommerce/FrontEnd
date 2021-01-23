<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

?>
<div class="container-fluid  well well-sm" style="background-color: #0d1117;border:0px;padding-top:15px;">
    <br>
    <div class="container">
        <div class="row">


            <ul class="breadcrumb fondoBreadcrumb  text-uppercase" style="background-color:#0d1117;padding-top:0px;padding-bottom:0px;border:none;top:-30px;margin-bottom:0px;font-size:25px;">

                <li style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"><a href="<?php echo $url; ?>">INICIO</a></li>
                <li class="active pagActiva" style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"> <?php echo $rutas[0] ?></li>

            </ul>


        </div>
    </div>
</div>





<?php

if (isset($rutas[1])) {

    if ($rutas[1] == "aviso") {

        echo '<div class="container-fluid">

					<div class="container">
	
					 	<div class="jumbotron"style="background-color: #0d1117;">

					 		<button type="button" class="close cerrarOfertas" style="margin-top:-50px;background-color: #0d1117;color:#fff"><h1>&times;</h1></button>

					 		<h1 class="text-center">¡Hola!</h1> 

					 		 <p class="text-center">
					 		 	
								Tu artículo ha sido asignado a tus compras, pero antes queremos presentarte las siguientes ofertas, si no deseas ver las ofertas y continuar en el artículo que acabas de adquirir haz click en el siguiente botón:
								<br><br>
								<a href="' . $url . 'perfil">
								<button class="btn btn-default backColor btn-lg">
								VER ARTÍCULOS COMPRADOS
								</button>
								</a>
								<br><br>
								<a href="#moduloOfertas">
								<button class="btn btn-default btn-lg">
								VER OFERTAS
								</button>
								</a>

					 		 </p>
					 
					 	</div>

					</div>

				</div>';
    }
}

?>

<div class="container-fluid">

    <div class="container">

        <div class="row" id="moduloOfertas">

            <?php

            $item = null;
            $valor = null;

            date_default_timezone_set('America/Lima');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha . ' ' . $hora;

            /*=============================================
			TRAEMOS LAS OFERTAS DE CATEGORÍAS
			=============================================*/

            $respuesta = ControladorProductos::ctrMostrarCategorias($item, $valor);

            foreach ($respuesta as $key => $value) {

                if ($value["oferta"] == 1) {

                    if ($value["finOferta"] > $fecha) {

                        $datetime1 = new DateTime($value["finOferta"]);
                        $datetime2 = new DateTime($fechaActual);

                        $interval = date_diff($datetime1, $datetime2);

                        $finOferta = $interval->format('%a');


                        echo '<div class="col-md-4 col-sm-6 col-xs-12" style="color:#fff;background-color: #0d1117;">

							<div class="ofertas" style="color:#fff;background-color: #0d1117;">
								
								<h3 class="text-center text-uppercase">

									¡OFERTA ESPECIAL EN <br>' . $value["categoria"] . '!
								
                                </h3>
                                <figure>

									<img class="img-responsive" src="' . $servidor . $value["imgOferta"] . '" width="100%">

									<div class="sombraSuperior"  ></div>';

                        if ($value["descuentoOferta"] != 0) {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">' . $value["descuentoOferta"] . '% DESCUENTO</h1>';
                        } else {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">S/. ' . $value["precioOferta"] . '</h1>';
                        }

                        echo '</figure>';

                        if ($finOferta == 0) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina hoy</h4>';
                        } elseif ($finOferta == 1) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' día</h4>';
                        } else {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' días</h4>';
                        }

                        echo ' 
                        
                        <div class="countdown" finOferta="' . $value["finOferta"] . '" style="color:#fff;margin-left:11%;margin-bottom:15px;font-size:10px;">
                        </div>

                        <a href="' . $url . $value["ruta"] . '" class="pixelOferta" titulo="'.$value["categoria"].'" style="margin-left:10%;padding-left:5%;margin-bottom:15px">

                         <button class="btn backColor btn-lg text-uppercase" style="margin-left:10%;padding-left:5%;margin-bottom:15px">Ir a la Oferta</button>

                        </a>
                        
                        </div>
                        </div>';

                    }

                }
            }

            /* mostrar subcategorias ofertas */

            $respuestaSubcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

			foreach ($respuestaSubcategorias as $key => $value) {

				if($value["oferta"] == 1 && $value["ofertadoPorCategoria"] == 0){

                    if ($value["finOferta"] > $fecha) {

                        $datetime1 = new DateTime($value["finOferta"]);
                        $datetime2 = new DateTime($fechaActual);

                        $interval = date_diff($datetime1, $datetime2);

                        $finOferta = $interval->format('%a');


                        echo '<div class="col-md-4 col-sm-6 col-xs-12" style="color:#fff;background-color: #0d1117;">

							<div class="ofertas" style="color:#fff;background-color: #0d1117;">
								
								<h3 class="text-center text-uppercase">

									¡OFERTA ESPECIAL EN <br>' . $value["subcategoria"] . '!
								
                                </h3>
                                <figure>

									<img class="img-responsive" src="' . $servidor . $value["imgOferta"] . '" width="100%">

									<div class="sombraSuperior"  ></div>';

                        if ($value["descuentoOferta"] != 0) {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">' . $value["descuentoOferta"] . '% DESCUENTO</h1>';
                        } else {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">S/. ' . $value["precioOferta"] . '</h1>';
                        }

                        echo '</figure>';

                        if ($finOferta == 0) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina hoy</h4>';
                        } elseif ($finOferta == 1) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' día</h4>';
                        } else {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' días</h4>';
                        }

                        echo ' 
                        
                        <div class="countdown" finOferta="' . $value["finOferta"] . '" style="color:#fff;margin-left:11%;margin-bottom:15px;font-size:10px;">
                        </div>

                        <a href="' . $url . $value["ruta"] . '" class="pixelOferta" style="margin-left:10%;padding-left:5%;margin-bottom:15px">

                         <button class="btn backColor btn-lg text-uppercase" style="margin-left:10%;padding-left:5%;margin-bottom:15px">Ir a la Oferta</button>

                        </a>
                        
                        </div>
                        </div>';

                    }

                }
            }

			$ordenar = "id";

			$respuestaProductos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

        
            foreach ($respuestaProductos as $key => $value) {

                if($value["oferta"] == 1 && $value["ofertadoPorCategoria"] == 0 && $value["ofertadoPorSubCategoria"] == 0){
                
                    if ($value["finOferta"] > $fecha) {

                        $datetime1 = new DateTime($value["finOferta"]);
                        $datetime2 = new DateTime($fechaActual);

                        $interval = date_diff($datetime1, $datetime2);

                        $finOferta = $interval->format('%a');


                        echo '<div class="col-md-4 col-sm-6 col-xs-12" style="color:#fff;background-color: #0d1117;">

							<div class="ofertas" style="color:#fff;background-color: #0d1117;">
								
								<h3 class="text-center text-uppercase">

									¡OFERTA ESPECIAL EN <br>' . $value["titulo"] . '!
								
                                </h3>
                                <figure>

									<img class="img-responsive" src="' . $servidor . $value["imgOferta"] . '" width="100%">

									<div class="sombraSuperior"  ></div>';

                        if ($value["descuentoOferta"] != 0) {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">' . $value["descuentoOferta"] . '% DESCUENTO</h1>';
                        } else {
                            echo '<h1 class="text-center text-uppercase"style="color:#fff;background-color: #0d1117;">S/. ' . $value["precioOferta"] . '</h1>';
                        }

                        echo '</figure>';

                        if ($finOferta == 0) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina hoy</h4>';
                        } elseif ($finOferta == 1) {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' día</h4>';
                        } else {
                            echo '<h4 class="text-center" style="color:#fff;background-color: #0d1117;">La oferta termina en ' . $finOferta . ' días</h4>';
                        }

                        echo ' 
                        
                        <div class="countdown" finOferta="' . $value["finOferta"] . '" style="color:#fff;margin-left:11%;margin-bottom:15px;font-size:10px;">
                        </div>

                        <a href="' . $url . $value["ruta"] . '" class="pixelOferta" style="margin-left:10%;padding-left:5%;margin-bottom:15px">

                         <button class="btn backColor btn-lg text-uppercase" style="margin-left:10%;padding-left:5%;margin-bottom:15px">Ir a la Oferta</button>

                        </a>
                        
                        </div>
                        </div>';

                    }

                }
            }
            ?>


        </div>

    </div>

</div>