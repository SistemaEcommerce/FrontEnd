<?php
$servidor=Ruta::ctrRutaServidor();
$url=Ruta::ctrRuta();

$ruta="articulor-gratis";
$banner=ControladorProductos::ctrMostrarBanner($ruta);


if (is_array($banner)) {

	$titulo1=json_decode($banner["titulo1"],true);
	$titulo2=json_decode($banner["titulo2"],true);
	$titulo3=json_decode($banner["titulo3"],true);
	if ($banner != null) {

		echo'
		<figure class="banner" style="height: 370px;">
		
			<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%" style="height: 500px;">	

			<div class="textoBanner '.$banner["estilo"].'">

				<h1 style="color:'.$titulo1["color"].';font-size: 50px;">'.$titulo1["texto"].'</h1>

				<h2 style="color:'.$titulo2["color"].';font-size: 50px;"><strong>'.$titulo2["texto"].'</strong></h2>

				<h3 style="color:'.$titulo3["color"].';font-size: 50px;">'.$titulo3["texto"].'</h3>

			</div>
		
		</figure>
		';
	}
	
}

?>


<?php
$servidor=Ruta::ctrRutaServidor();

$titulosModulos=array("ARTICULOS GRATUITOS","LO MAS VENDIDO","LO MAS VISTO","OFERTA");
$rutaModulos=array("articulos-gratis","lo-mas-vendidos","lo-mas-visto","articulos-oferta");
$base=0;
$tope=8;
$modo="DESC";
if ($titulosModulos[0]=="ARTICULOS GRATUITOS") {
	/* $base=0; */
	$ordenar="id";
	$item="precio";
	$valor=0;
	
	$gratis=ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}
if ($titulosModulos[1]=="LO MAS VENDIDO") {
	/* $base=0; */
	$ordenar="ventas";
	$item=null;
	$valor=null;
    $ventas=ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}
if ($titulosModulos[2]=="LO MAS VISTO") {
	/* $base=0; */
	$ordenar="vistas";
	$item=null;
	$valor=null;
    $vistas=ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}
if ($titulosModulos[3]=="OFERTA") {
	/* $base=0; */
	$ordenar="oferta";
	$item=null;
	$valor=null;
    $oferta=ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);
}
$modulos=array($gratis,$ventas,$vistas,$oferta);

for ($i=0; $i <count($titulosModulos) ; $i++) { 
	echo '
	<div class="container-fluid well well-sm barraProductos" >

		<div class="container">

			<div class="row">
    	        <div class="col-xs-12 organizarProductos">
	
    	            <h2>'.$titulosModulos[$i].'</h2>
    	            <div class="btn-group pull-right">

						 <button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">

							<i class="fa fa-th" aria-hidden="true"></i>  

							<span class="col-xs-0 pull-right"> GRID</span>

						 </button>

						 <button type="button" class="btn btn-default btnList" id="btnList'.$i.'">

							<i class="fa fa-list" aria-hidden="true"></i> 

							<span class="col-xs-0 pull-right"> LIST</span>

						 </button>

					</div>		

				</div>

			</div>

		</div>

	</div>

	<div class="container-fluid productos">
	
		<div class="container">

			<div class="row">
			
		
			<div class="col-xs-12 tituloDestacado">
				
				

				<div class="col-sm-6 col-xs-12">
					
					<h1><small>'.$titulosModulos[$i].' </small></h1>

				</div>

				

				<div class="col-sm-6 col-xs-12">
					
					<a href="'.$rutaModulos[$i].'">
						
						<button class="btn btn-default backColor pull-right">
							
							VER MÁS <span class="fa fa-chevron-right"></span>

						</button>

					</a>

				</div>

			

			</div>

			<div class="clearfix"></div>

			<hr>

			</div>

	
	
			<ul class="grid'.$i.' pro" style="color:#000;">';
				
			foreach ($modulos[$i] as $key => $value) {
				echo '
				<li class="col-md-3 col-sm-6 col-xs-12">
				
				
	
					<figure>

						<a href="'.$url.$value["ruta"].'" class="pixelProducto">

							<img src="'.$servidor.$value["portada"].'" class="img-responsive">

						</a>

					</figure>


					<h4>

						<small>

							<a href="'.$url.$value["ruta"].'" class="pixelProducto">
							'.$value["titulo"].'
							
							';
							
						
							if ($value["nuevo"]!=0) {
								echo'
									<span class="label label-warning fontSize"> Nuevo </span> 
									<span style="color: rgb(37, 33, 33)">-</span>
									
								';
							}
                            if ($value["oferta"]!=0) {
                                echo'
									<span class="label label-warning fontSize"> '.$value["descuentoOferta"].' % OFF</span> 
									
							';
                            }

						echo'	</a>	

						</small>			

					</h4>
					

					<div class="col-xs-6 precio">';

					if ($value["precio"]==0) {
					echo'<h2><small>GRATIS</small></h2> <br><br>';
					}else{
						if ($value["oferta"]!=0) {
							echo'<h2><small>
									 <strong class="oferta" style="padding-left:5px;padding-right:5px ;border-radius:30px;color:red;font-size:15px;background-color:rgb(76, 199, 117)"> S/.'.$value["precio"].' SOL 
									 </strong>
								 </small></h2>
								 <small style="color:green ;font-size:26px;">  S/.'.$value["precioOferta"].' SOL</small>
								 ';
						}else{

							echo'<h2><small style="color:green;font-size:20px">S/.'.$value["precio"].' SOL</small></h2> <br> <br>';
						}
					}
					
					echo'
					

					</div>


					<div class="col-xs-6 enlaces">

						<div class="btn-group pull-right">

							<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

								<i class="fa fa-heart" aria-hidden="true"></i>

							</button>';
							if ($value["tipo"]=="virtual" && $value["precio"]!=0) {
								if ($value["oferta"]!=0) {
									echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" 
									tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" stock="'.$value["stock"].'"  data-toggle="tooltip" 
									title="Agregar al carrito de compras">
							   
										   <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>';
							   
								   
								}else{

									echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									 imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" 
									 tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" stock="'.$value["stock"].'"  data-toggle="tooltip" 
									 title="Agregar al carrito de compras">
								
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											</button>';
								}
									
							}
							echo'<a href="'.$url.$value["ruta"].'" class="pixelProducto">

								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

									<i class="fa fa-eye" aria-hidden="true"></i>

								</button>	

							</a>

						</div>

					</div>

				</li>
				';
			}

			echo'
	

			</ul>



			<ul class="list'.$i.'" style="display:none">';

			foreach ($modulos[$i] as $key => $value) {

				echo '<li class="col-xs-12">
				  
					  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						   
						<figure>
					
							<a href="'.$url.$value["ruta"].'" class="pixelProducto">
								
								<img src="'.$servidor.$value["portada"].'" class="img-responsive">

							</a>

						</figure>

					  </div>
						  
					<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
						
						<h1>

							<small>

								<a href="'.$url.$value["ruta"].'" class="pixelProducto">

									<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									'.$value["titulo"].'<br>';

									if($value["nuevo"] != 0){

										echo '<span class="label label-warning">Nuevo</span> ';

									}

									if($value["oferta"] != 0){

										echo '<span class="label label-warning">'.$value["descuentoOferta"].'% off</span>';

									}		

								echo '</a>

							</small>

						</h1>

						<p class="text-muted">'.$value["titular"].'</p>';

						if($value["precio"] == 0){

							echo '<h2><small>GRATIS</small></h2>';

						}else{

							if($value["oferta"] != 0){

								echo'<h2><small>
										<strong class="oferta" style="padding-left:5px;padding-right:15px;border-radius:30px;color:red;font-size:15px;background-color:rgb(76, 199, 117)"> S/.'.$value["precio"].' SOL 
									</strong>
									</small></h2>
									<span style="color: rgb(37, 33, 33);">-</span>
									<small style="color:green ;font-size:26px;line-height: 25px;padding-right:5;margin-right:5px;" > S/.'.$value["precioOferta"].' SOL</small>
							';

							}else{

								echo'<h2><small style="color:green;font-size:20px;padding-right:15px;">S/.'.$value["precio"].' SOL</small></h2>  ';

							}
							
						}

						echo '<div class="btn-group pull-left enlaces">
						  
							  <button type="button" class="btn btn-default btn-xs deseos"  idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

								  <i class="fa fa-heart" aria-hidden="true"></i>

							  </button>';

							  if ($value["tipo"]=="virtual" && $value["precio"] != 0) {
								if ($value["oferta"]!=0) {
									echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" 
									tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" stock="'.$value["stock"].'"  data-toggle="tooltip" 
									title="Agregar al carrito de compras">
							   
										   <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>';
							   
								   
								}else{

									echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									 imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" 
									 tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" stock="'.$value["stock"].'"  data-toggle="tooltip" 
									 title="Agregar al carrito de compras">
								
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											</button>';
								}
									
							}

						
								echo '<a href="'.$url.$value["ruta"].'" class="pixelProducto">

								  <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

								  <i class="fa fa-eye" aria-hidden="true"></i>

								  </button>

							  </a>
						
						</div>

					</div>

					<div class="col-xs-12"><hr></div>

				</li>';

			}

			echo '</ul>

		</div>

	</div>'
			

	;
}
?>