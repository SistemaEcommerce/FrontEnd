<?php
  $url=Ruta::ctrRuta();
  $servidor=Ruta::ctrRutaServidor();

?>

<div class="container-fluid  productos" style="background-color: #0d1117;border:0px;padding-top:15px;">
<br>
    <div class="container">
        <div class="row">
          

               <ul class="breadcrumb fondoBreadcrumb  text-uppercase" style="background-color:#0d1117;padding-top:0px;padding-bottom:0px;border:none;top:-30px;margin-bottom:0px;font-size:25px;">
				
				    <li  style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"><a href="<?php echo $url;?>">INICIO</a></li>
				    <li  class="active pagActiva" style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"> <?php echo $rutas[0] ?></li>

                </ul>

            
        </div>
    </div>
</div>
<div class="container-fluid infoproducto" style="padding-top:10px;">
	
	<div class="container">
        <br>
		
        <div class="row" style="border:5px solid #fff;">
            <br>
            <?php
            $item="ruta";
            $valor=$rutas[0];
            $infoproducto=ControladorProductos::ctrMostrarInfoProducto($item,$valor);
            $multimedia = json_decode($infoproducto["multimedia"],true);

            if($infoproducto["tipo"] == "fisico"){

                echo '<div class="col-md-5 col-sm-6 col-xs-12 visorImg">
                    
                        <figure class="visor">';

                        if($multimedia != null){

                            for($i = 0; $i < count($multimedia); $i ++){

                                echo '<img id="lupa'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'">';

                            }								

                            echo '</figure>

                            <div class="flexslider">
                              
                              <ul class="slides">';

                            for($i = 0; $i < count($multimedia); $i ++){

                                echo '<li>
                                     <img value="'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'" alt="'.$infoproducto["titulo"].'">
                                </li>';

                            }	

                        }	
                                                     
                          echo '</ul>

                        </div>

                    </div>';			


            }else{
                /* video */
                echo'
                <div class="col-md-6 col-sm-6 col-xs-12 " >
                    <iframe  class="videoPresentacion" src="https://www.youtube.com/embed/'.$infoproducto["multimedia"].'?rel=0&autoplay=0" width="100%" frameborder="0" allowfullscreen></iframe>
                </div>  
                ';
            }


            ?>
            <?php
                /* productos */
                if ($infoproducto["tipo"]=="fisico") {

                    echo '<div class="col-md-7 col-sm-6 col-xs-12">';

                }else{

               		echo '<div class="col-sm-6 col-xs-12">';
             
                }
            ?>
            <!-- regreso -->
            <br>
                <div class="col-xs-6" style="padding: 15px;">
					
					<h6>
						
						<a href="javascript:history.back()" class="text-muted" style="color:#fff;font-size:17px;">
							
							<i class="fa fa-reply"></i> Continuar Comprando

						</a>

					</h6>

                </div>
                <!-- social -->
                <div class="col-xs-6" style="padding: 15px;">
                    <h6>
                        <a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" style="color:#fff;font-size:17px;">
                            <i class="fa fa-plus"></i> Compartir
                        </a>

                        <ul class="dropdown-menu pull-right compartirRedes">
                            <li>
                                <p class="btnFacebook">
                                    
                                    <i class="fa fa-facebook"></i>
                                    <!-- facebook -->
                                </p>
                            </li>
                            <li>
                                <p class="btnGoogle">
                                    <i class="fa fa-google"></i>
                                    <!-- google -->
                                </p>
                            </li>
                        </ul>
                    </h6>
                
                </div>
                <div class="clearfix"></div>
            	<?php
						
					
					if($infoproducto["oferta"] == 0){

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="text-muted text-uppercase" style="color:#fff;margin-top:0px;font-size:25px">'.$infoproducto["titulo"].'</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase"style="color:#fff;margin-top:0px;font-size:25px">'.$infoproducto["titulo"].'

							<br>

							<small>
						
								<span class="label label-warning">Nuevo</span>

							</small>

							</h1>';

						}

					}else{

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="text-muted text-uppercase" style="color:#fff;margin-top:0px;font-size:25px">'.$infoproducto["titulo"].'

							<br>

							<small>
						
								<span class="label label-warning">'.$infoproducto["descuentoOferta"].'% off</span>

							</small>
							
							</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase" style="color:#fff; margin-top:0px;" >'.$infoproducto["titulo"].'

							<br>

							<small>
								<span class="label label-warning">Nuevo</span> 
								<span class="label label-warning">'.$infoproducto["descuentoOferta"].'% off</span> 


							</small>
							
							</h1>';

						}
					}

                        /* titulo */
					if($infoproducto["precio"] == 0){

						echo '<h2 class="text-muted" style="color:green;font-size:35px;padding-top:0px;margin-top:0px;">GRATIS</h2>';

					}else{

						if($infoproducto["oferta"] == 0){

                            echo '<h2 class="text-muted" style="color:green ;font-size:40px;margin-top:0px;">
                                    S/.'.$infoproducto["precio"].' SOL</h2>';

						}else{

							echo '<h2 class="text-muted">

                                <span>
								
									<strong style="color:red ;font-size:20px;margin-top:0px;" class="oferta">S/.'.$infoproducto["precio"].' SOL</strong>

								</span>

								<span style="color:green;padding-left:15px;margin-top:0px;">
									
									S/.'.$infoproducto["precioOferta"].' SOl

								</span>

							</h2>';

						}

					}

				/* descripcion */

					echo '<p style="font-size:20px;margin-top:0px;top:-15px;">'.$infoproducto["descripcion"].'</p>';

                ?>
                <hr>
                <div class="form-group row">
                        <?php

					        if($infoproducto["detalles"] != null){

                                $detalles = json_decode($infoproducto["detalles"], true);

                                if($infoproducto["tipo"] == "fisico"){
                                  
                                    if($detalles["Talla"]!=null){
                                        echo'
                                        <div class="col-md-3 col-xs-12" >
                                            <select class="form-control seleccionarTalla" id="seleccionarTalla" 
                                            style="color:black;background-color: #0d1117;border:none;">
                                                <option style="color:black;background-color: #0d1117;border:none;" value="">Talla</option>';

                                                for($i = 0; $i <= count($detalles["Talla"]); $i++){ 
                                                    
                                                    echo'<option  style="color:black;background-color: #0d1117;border:none;"
                                                    value="'.$detalles["Talla"][$i].'">'.$detalles["Talla"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    if($detalles["Color"]!=null){

                                        echo '<div class="col-md-3 col-xs-12">

                                            <select class="form-control seleccionarDetalle" id="seleccionarColor"
                                                style="color:black;background-color: #0d1117;border:none;">

                                                <option style="color:black;background-color: #0d1117;border:none;" value="">Color</option>';

                                                for ($i=0; $i <=count($detalles["Color"]) ; $i++) { 
                                                    
                                                    echo'<option  style="color:black;background-color: #0d1117;border:none;" 
                                                        value="'.$detalles["Color"][$i].'">'.$detalles["Color"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    if($detalles["Marca"]!=null){

                                        echo '<div class="col-md-3 col-xs-12">

                                            <select class="form-control seleccionarDetalle" id="seleccionarMarca"
                                                style="color:black;background-color: #0d1117;border:none;">

                                                <option style="color:black;background-color: #0d1117;border:none;" value="">Marca</option>';

                                                for($i = 0; $i <= count($detalles["Marca"]); $i++){
                                                    
                                                    echo'<option  style="color:black;background-color: #0d1117;border:none;" 
                                                    value="'.$detalles["Marca"][$i].'">'.$detalles["Marca"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    /* stock */
                                    $infoproductoruta=$infoproducto["stock"];
                                    /* echo'<i class="fa fa-shopping-cart" 
                                    style="color:black;background-color: #0d1117;border:none;font-size:25px;"> STOCK '.$infoproductoruta.'</i> '; */
 
                            /*         echo'
                                        <div class="col-md-3 col-xs-12" >
                                            <select class="form-control seleccionarDetalle" id="seleccionarTalla"
                                            style="color:black;background-color: #0d1117;border:none;text-align: right;">
                                                 <option style="color:black;background-color: #0d1117;border:none;text-align: right;" 
                                                value="">Stock   '.$infoproductoruta.'</option>
                                        ';
                                    for ($i=1; $i <=$infoproductoruta ; $i++) { 
                                        
                                        echo'<option  style="color:black;background-color: #0d1117;border:none;text-align: right;" value="">'.$i.'</option>';
                                        
                                    }
                                    echo'</select>
                                    </div>
                                    '; */

                                    
                                    
                                }else{
                                    echo'
                                    <div class="col-xs-12" >
                                       <li>
                                            <i class="fa fa-play-circle"> </i> '.$detalles["Clases"].'
                                       </li>
                                       <li>
                                            <i class="fa fa-clock-o"> </i> '.$detalles["Tiempo"].'
                                       </li>
                                       <li>
                                            <i class="fa fa-check-circle"> </i> '.$detalles["Nivel"].'
                                       </li>
                                       <li>
                                            <i class="fa fa-info-circle"> </i> '.$detalles["Acceso"].'
                                       </li>
                                       <li>
                                            <i class="fa fa-desktop"> </i> '.$detalles["Dispositivo"].'
                                       </li>
                                       <li>
                                            <i class="fa fa-trophy"> </i> '.$detalles["Certificado"].'
                                       </li>

                                    </div>
                                    ';

                                }
                            }
                        /* entrega */
                      
                        if($infoproducto["entrega"] == 0){

                            if($infoproducto["precio"] == 0){
    
                                echo '<h4 class="col-md-12 col-sm-0 col-xs-0">
    
                                    <hr>
    
                                    <span class="label label-default" style="font-weight:100">
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        Entrega inmediata | 
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventasGratis"].' inscritos |
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas
    
                                    </span>
    
                                </h4>
    
                                <h4 class="col-lg-0 col-md-0 col-xs-12">
    
                                    <hr>
    
                                    <small>
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        Entrega inmediata <br>
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventasGratis"].' inscritos <br>
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas
    
                                    </small>
    
                                </h4>';
    
                            }else{
    
                                echo '<h4 class="col-md-12 col-sm-0 col-xs-0">
    
                                    <hr>
    
                                    <span class="label label-default" style="font-weight:100">
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        Entrega inmediata |
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventas"].' ventas |
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].' </span> personas
    
                                    </span>
    
                                </h4>
    
                                <h4 class="col-lg-0 col-md-0 col-xs-12">
    
                                    <hr>
    
                                    <small>
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        Entrega inmediata <br> 
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventas"].' ventas <br>
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].'</span> personas
    
                                    </small>
    
                                </h4>';
    
                            }
    
                        }else{
    
                            if($infoproducto["precio"] == 0){
    
                                echo '<h4 class="col-md-12 col-sm-0 col-xs-0">
    
                                    <hr>
    
                                    <span class="label label-default" style="font-weight:100">
                                    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        '.$infoproducto["entrega"].' días hábiles para la entrega  |
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventasGratis"].' solicitudes  |
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas  
    
                                    </span>
    
                                </h4>
    
                                <h4 class="col-lg-0 col-md-0 col-xs-12">
    
                                    <hr>
    
                                    <small>
                                    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        '.$infoproducto["entrega"].' días hábiles para la entrega  <br>
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventasGratis"].' solicitudes  <br>
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].' </span> personas 
    
                                    </small>
    
                                </h4>';
    
                            }else{
    
                                echo '<h4 class="col-md-12 col-sm-0 col-xs-0">
    
                                    <hr>
    
                                    <span class="label label-default" style="font-weight:100">
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        '.$infoproducto["entrega"].' días hábiles para la entrega |
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventas"].' ventas |
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].' </span> personas
    
                                    </span>
    
                                </h4>
    
                                <h4 class="col-lg-0 col-md-0 col-xs-12">
    
                                    <hr>
    
                                    <small>
    
                                        <i class="fa fa-clock-o" style="margin-right:5px"></i>
                                        '.$infoproducto["entrega"].' días hábiles para la entrega <br>
                                        <i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
                                        '.$infoproducto["ventas"].' ventas <br>
                                        <i class="fa fa-eye" style="margin:0px 5px"></i>
                                        Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].'</span> personas
    
                                    </small>
    
                                </h4>';
    
                            }
    
                        }	
                        
                        ?>

                    </div >

                        <!-- botoens compra -->
                    <div class="row botonesCompra">
                       
                    <?php

                        if($infoproducto["precio"]==0){
                        
                            echo '<div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">';
                        
                                if($infoproducto["tipo"]=="virtual"){
                                
                                    echo '<button class="btn btn-default btn-block btn-lg backColor">ACCEDER AHORA</button>';
                                
                                }else{
                                
                                    echo '<button class="btn btn-default btn-block btn-lg backColor">SOLICITAR AHORA</button>';
                                
                                }
                            
                                echo '</div>';
                            
                        }else{
                        
                            if($infoproducto["tipo"]=="virtual"){
                            
                                echo '<div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">

                                        <button class="btn btn-default btn-block btn-lg backColor">
                                        <small>COMPRAR AHORA</small></button>
                            
                                    </div>
                            
                                    <div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">

                                        <button class="btn btn-default btn-block btn-lg backColor">
                            
                                        <i class="fa fa-shopping-cart col-md-0"></i>
                                        <small>ADICIONAR AL CARRITO</small> 
                            
                            
                                        </button>
                            
                                    </div>
                                    
                                    ';
                            }else{
                            
                                echo '<div class="col-lg-6 col-md-8 col-xs-12" style="margin-bottom: 15px;">

                                        <button class="btn btn-default btn-block btn-lg backColor">
                            
                                        <i class="fa fa-shopping-cart"></i>
                                        ADICIONAR AL CARRITO 
                            
                            
                                        </button>
                            
                                    </div>';
                            
                            }
                        
                        }

                    ?>
                       
                    </div>

                <figure class="lupa"  > 
                    <img src="" alt="">
                </figure>
            </div>

        </div>
        <br>
        <!-- Comentarios -->
        <hr>
        <br>
        <div class="row">
			
			<ul class="nav nav-tabs">
				
					<li class="active"><a>COMENTARIOS 22</a></li>
					<li><a href="">Ver más</a></li>
					<li class="pull-right"><a class="text-muted">PROMEDIO DE CALIFICACIÓN: 3.5 | 

						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star-half-o text-success"></i>
						<i class="fa fa-star-o text-success"></i>
					
					</a></li>

			</ul>

			<br>

		</div>

		<div class="row comentarios">
			
			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
			      
			      <div class="panel-heading text-uppercase">

			      	Andrés Felipe
			      	<span class="text-right">
			      		<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

			      	</span>

			      </div>
			     
			      <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

			      <div class="panel-footer">
			      	
			      	<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star-half-o text-success"></i>
					<i class="fa fa-star-o text-success"></i>

			      </div>
			    
			    </div>

			</div>

			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
			      
			      <div class="panel-heading text-uppercase">

			      	Andrés Felipe
			      	<span class="text-right">
			      		<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

			      	</span>

			      </div>
			     
			      <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

			      <div class="panel-footer">
			      	
			      	<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star-half-o text-success"></i>
					<i class="fa fa-star-o text-success"></i>

			      </div>
			    
			    </div>

			</div>

			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
			      
			      <div class="panel-heading text-uppercase">

			      	Andrés Felipe
			      	<span class="text-right">
			      		<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

			      	</span>

			      </div>
			     
			      <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

			      <div class="panel-footer">
			      	
			      	<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star text-success"></i>
					<i class="fa fa-star-half-o text-success"></i>
					<i class="fa fa-star-o text-success"></i>

			      </div>
			    
			    </div>

			</div>

                <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                    
                    <div class="panel panel-default">
                    
                    <div class="panel-heading text-uppercase">

                        Andrés Felipe
                            <span class="text-right">
                                <img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

                            </span>

                    </div>
                    
                    <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

                    <div class="panel-footer">
                        
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>

                    </div>
                    
                    </div>

                </div>
		
		</div>

        <hr>
        
    </div>

</div>
<!-- articulos rela -->

 <hr>
 <div class="container-fluid productos">
	
	<div class="container">

		<div class="row">

			<div class="col-xs-12 tituloDestacado">

				<div class="col-sm-6 col-xs-12">
			
					<h1><small>PRODUCTOS RELACIONADOS</small></h1>

				</div>

				<div class="col-sm-6 col-xs-12">

				<?php

					$item = "id";
					$valor = $infoproducto["id_subcategoria"];

					$rutaArticulosDestacados = ControladorProductos::ctrMostrarSubcategorias($item, $valor);

					echo '<a href="'.$url.$rutaArticulosDestacados[0]["ruta"].'">
						
						<button class="btn btn-default backColor pull-right">
							
							VER MÁS <span class="fa fa-chevron-right"></span>

						</button>

					</a>';

				?>

				</div>

			</div>

			<div class="clearfix"></div>

			<hr>

		</div>

		<?php

			$ordenar = "";
			$item = "id_subcategoria";
			$valor = $infoproducto["id_subcategoria"];
			$base = 0;
			$tope = 4;
			$modo = "Rand()";

			$relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

			if(!$relacionados){

				echo '<div class="col-xs-12 error404">

					<h1><small>¡Oops!</small></h1>

					<h2>No hay productos relacionados</h2>

				</div>';

			}else{

				echo '<ul class="grid0">';

				foreach ($relacionados as $key => $value) {
				
				echo '<li class="col-md-3 col-sm-6 col-xs-12">

						        <figure>

					            	<a href="'.$url.$value["ruta"].'" class="pixelProducto">

					            		<img src="'.$servidor.$value["portada"].'" class="img-responsive">

					            	</a>

					            </figure>


					            <h4>

						        <small>

					    		<a href="'.$url.$value["ruta"].'" class="pixelProducto">
					    		'.$value["titulo"].'
							
							    <span style="color:rgba(0,0,0,0)">-</span>';

									if($value["nuevo"] != 0){

                                        echo '
                                            <span class="label label-warning fontSize"> Nuevo </span> 
                                            <span style="color: rgb(37, 33, 33)">-</span>
                                          ';  

									}

									if($value["oferta"] != 0){

                                        echo '
                                          <span class="label label-warning fontSize"> '.$value["descuentoOferta"].' % OFF</span> 
                                        ';                               
									}

								echo '</a>	

							</small>			

						</h4>

						<div class="col-xs-6 precio">';

						if($value["precio"] == 0){

							echo '<h2><small>GRATIS</small></h2><br><br>';

						}else{

							if($value["oferta"] != 0){

								echo '<h2><small>
                                          <strong class="oferta" style="padding-left:5px;padding-right:5px ;border-radius:30px;color:red;font-size:15px;background-color:rgb(76, 199, 117)"> S/.'.$value["precio"].' SOL 
                                          </strong>
                                      </small></h2>
                                      <small style="color:green ;font-size:26px;">  S/.'.$value["precioOferta"].' SOL</small>
                            ';

							}else{

                                echo'<h2><small style="color:green;font-size:20px">S/.'.$value["precio"].' SOL</small></h2> <br> <br>';

							}
							
						}
										
						echo '</div>

						<div class="col-xs-6 enlaces">
							
							<div class="btn-group pull-right">
								
								<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
									
									<i class="fa fa-heart" aria-hidden="true"></i>

								</button>';

								if($value["tipo"] == "virtual" && $value["precio"] != 0){

									if($value["oferta"] != 0){

										echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									        imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" 
									        tipo="'.$value["tipo"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" 
									        title="Agregar al carrito de compras">
							   
										   <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</button>';

									}else{

										echo'<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'"
									         imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" 
									         tipo="'.$value["tipo"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" 
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

					</li>';
				}
                
			echo ' </ul>';

		}

		?>

    </div>


</div>
<hr>