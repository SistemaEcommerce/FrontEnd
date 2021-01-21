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
                                <p class="btnGoogle" style="display: none;">
                                    <i class="fa fa-google"></i>
                                    <!-- google -->
                                </p>
                            </li>
                        </ul>
                    </h6>
                
                </div>
                <div class="clearfix"></div>
            	<?php
                        
                        echo '<div class="comprarAhora" style="display:none">


                        <button class="btn btn-default backColor quitarItemCarrito" idProducto="'.$infoproducto["id"].'" 
                        peso="'.$infoproducto["peso"].'"></button>

						<p class="tituloCarritoCompra text-left">'.$infoproducto["titulo"].'</p>';
                        if($infoproducto["oferta"] == 0){

							echo'<input class="cantidadItem" value="1" tipo="'.$infoproducto["tipo"].'" precio="'.$infoproducto["precio"].'" idProducto="'.$infoproducto["id"].'">

							<p class="subTotal'.$infoproducto["id"].' subtotales">
						
								<strong>USD $<span>'.$infoproducto["precio"].'</span></strong>

							</p>

							<div class="sumaSubTotal"><span>'.$infoproducto["precio"].'</span></div>';


						}else{

							echo'<input class="cantidadItem" value="1" tipo="'.$infoproducto["tipo"].'" precio="'.$infoproducto["precioOferta"].'" idProducto="'.$infoproducto["id"].'">

							<p class="subTotal'.$infoproducto["id"].' subtotales">
						
								<strong>USD $<span>'.$infoproducto["precioOferta"].'</span></strong>

							</p>

							<div class="sumaSubTotal"><span>'.$infoproducto["precioOferta"].'</span></div>';


						}

					




					echo '</div>';
                        /* titulo */
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
                                            <select class="form-control seleccionarDetalle" id="seleccionarTalla" 
                                            style="color:#fff;background-color: #0d1117;border:none;">
                                                <option style="color:#fff;background-color: #0d1117;border:none;" value="">Talla</option>';

                                                for($i = 0; $i <= count($detalles["Talla"]); $i++){ 
                                                    
                                                    echo'<option  style="color:#fff;background-color: #0d1117;border:none;"
                                                    value="'.$detalles["Talla"][$i].'">'.$detalles["Talla"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    if($detalles["Color"]!=null){

                                        echo '<div class="col-md-3 col-xs-12">

                                            <select class="form-control seleccionarDetalle" id="seleccionarColor"
                                                style="color:#fff;background-color: #0d1117;border:none;">

                                                <option style="color:#fff;background-color: #0d1117;border:none;" value="">Color</option>';

                                                for ($i=0; $i <=count($detalles["Color"]) ; $i++) { 
                                                    
                                                    echo'<option  style="color:#fff;background-color: #0d1117;border:none;" 
                                                        value="'.$detalles["Color"][$i].'">'.$detalles["Color"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    if($detalles["Marca"]!=null){

                                        echo '<div class="col-md-3 col-xs-12">

                                            <select class="form-control seleccionarDetalle" id="seleccionarMarca"
                                                style="color:#fff;background-color: #0d1117;border:none;">

                                                <option style="color:#fff;background-color: #0d1117;border:none;" value="">Marca</option>';

                                                for($i = 0; $i <= count($detalles["Marca"]); $i++){
                                                    
                                                    echo'<option  style="color:#fff;background-color: #0d1117;border:none;" 
                                                    value="'.$detalles["Marca"][$i].'">'.$detalles["Marca"][$i].'</option>';

                                                }
                                            echo'</select>
                                        </div>
                                        ';
                                    }
                                    /* stock */
                                
/*                                     $infoproductoruta=$infoproducto["stock"];
                                    echo'<i class="fa fa-shopping-cart" 
                                    style="color:while;background-color: #0d1117;border:none;font-size:25px;"> STOCK '.$infoproductoruta.'</i> '; 
 
                                    echo'
                                        <div class="col-md-3 col-xs-12" >
                                            <select class="form-control seleccionarDetalle" id="seleccionarTalla"
                                            style="color:#fff;background-color: #0d1117;border:none;text-align: right;">
                                                 <option style="color:#fff;background-color: #0d1117;border:none;text-align: right;" 
                                                value="">Stock   '.$infoproducto["stock"].'</option>
                                        ';
                                    for ($i=1; $i <=$infoproducto["stock"] ; $i++) { 
                                        
                                        echo'<option  style="color:#fff;background-color: #0d1117;border:none;text-align: right;" value="">'.$i.'</option>';
                                        
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

                            if (isset($_SESSION["validarSesion"]) && isset($_SESSION["validarSesion"])=="ok" ) {

                                if ($infoproducto["tipo"]=="virtual") {
                                    echo '<button class="btn btn-default btn-block btn-lg backColor agregarGratis" idProducto="'.$infoproducto["id"].'" idUsuario="'.$_SESSION["id"].'" tipo="'.$infoproducto["tipo"].'" titulo="'.$infoproducto["titulo"].'">ACCEDER AHORA</button>';
                                } else {
                                    echo '<button class="btn btn-default btn-block btn-lg backColor agregarGratis" idProducto="'.$infoproducto["id"].'" idUsuario="'.$_SESSION["id"].'" tipo="'.$infoproducto["tipo"].'" titulo="'.$infoproducto["titulo"].'">SOLICITAR AHORA</button>
                                    <br>
                                    <div class="col-xs-12 alert alert-info text-left"style="color:#000">
                                    <strong style="color:#000"> ¡Atencion! </strong>
                                    El producto a solicitar es totalmente gratuito y se le enviara a su direccion registrada,solo se cobrara el envio
                                    </div>';
                                }
                            }else{

                                echo '<a href="#modalIngreso" data-toggle="modal">
                                <button class="btn btn-default btn-block btn-lg backColor">Ingresar Sistema</button>
                                </a>
                                <br>
                                <div class="col-xs-12 alert alert-info text-left"style="color:#000">
                                <strong style="color:#000"> ¡Atencion! </strong>
                                El producto a solicitar es totalmente gratuito y se le enviara a su direccion registrada,solo se cobrara el envio
                                </div>
                                ';
                            

                            }
                                echo '</div>';
                            
                        }else{
                        
                            if($infoproducto["tipo"]=="virtual"){
                            
                                echo '<div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">';
                                if(isset($_SESSION["validarSesion"])){
                                    if($_SESSION["validarSesion"] == "ok"){

                                         /* echo'<button class="btn btn-default btn-block btn-lg backColor">
                                        <i class="fa fa-shopping-cart col-md-0"></i>
                                        <small>COMPRAR AHORA</small></button>'; */
                                        echo '<a  id="btnCheckout" href="#modalComprarAhora" data-toggle="modal" idUsuario="'.$_SESSION["id"].'">
                                            <button class="btn btn-default btn-block btn-lg backColor">
									            <small>  <i class="fa fa-shopping-cart col-md-0"></i>COMPRAR AHORA</small></button></a>';
                                        
                                    }else{
                                        echo '<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default btn-block btn-lg">
									    <small>COMPRAR AHORA</small></button></a>';
                                    }
                                }

                                     
                            
                                   echo' </div>
                            
                                    <div class="col-md-6 col-xs-12" style="margin-bottom: 15px;">

                                    <button class="btn btn-default btn-block btn-lg backColor agregarCarrito" idProducto="'.$value["id"].'"
                                    imagen="'.$servidor.$infoproducto["portada"].'" titulo="'.$infoproducto["titulo"].'" precio="'.$infoproducto["precioOferta"].'" 
                                    tipo="'.$infoproducto["tipo"].'" peso="'.$infoproducto["peso"].'" stock="'.$infoproducto["stock"].'">
                            
                                        <i class="fa fa-shopping-cart col-md-0"></i>
                                        
                                        <small>ADICIONAR AL CARRITO</small> 
                            
                            
                                        </button>
                            
                                    </div>
                                    
                                    ';
                            }else{
                            
                                echo '<div class="col-lg-6 col-md-8 col-xs-12" style="margin-bottom: 15px;">

                                         <button class="btn btn-default btn-block btn-lg backColor agregarCarrito" idProducto="'.$value["id"].'"
                                        imagen="'.$servidor.$infoproducto["portada"].'" titulo="'.$infoproducto["titulo"].'" precio="'.$infoproducto["precioOferta"].'" 
                                        tipo="'.$infoproducto["tipo"].'" peso="'.$infoproducto["peso"].'" stock="'.$infoproducto["stock"].'">
                            
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

            <?php

			    $datos = array("idUsuario"=>"",
			    			   "idProducto"=>$infoproducto["id"]);
                        
			    $comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);
			    $cantidad = 0;
                        
                $cantidad = 0;
                if (is_array($comentarios)) {
                    foreach ($comentarios as $key => $value) {
                        if ($value["comentario"] != "") {
                            // $cantidad += count($value["id"]);  esta linea se debe eliminar
                            $cantidad++;
                            
                        }
                    }
                
			    }

			?>
        
			<ul class="nav nav-tabs">
            <?php

                $cantidadCalificacion = 0;

                if($cantidad == 0){
                    echo '<li class="active"><a>ESTE PRODUCTO NO TIENE COMENTARIOS</a></li>
						  <li></li>';
                }else{
                    echo '<li class="active"><a>COMENTARIOS '.$cantidad.'</a></li>
                          <li><a id="verMas" href="">Ver más</a></li>';
                          
                          $sumaCalificacion = 0;
 
                          foreach ($comentarios as $key => $value) {
                           
                            if ($value["calificacion"] != 0) {
                           
                              // $cantidadCalificacion += count($value["id"]);
                              $cantidadCalificacion++;
                           
                              $sumaCalificacion += $value["calificacion"];
                            }
                          
                          }

                          $promedio = round($sumaCalificacion / $cantidadCalificacion, 1);
                          
                          echo '<li class="pull-right"><a class="text-muted">PROMEDIO DE CALIFICACIÓN: '.$promedio.' | ';

                          if($promedio >= 0 && $promedio < 0.5){
      
                              echo '<i class="fa fa-star-half-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';
      
                          }else if($promedio >= 0.5 && $promedio < 1){

                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 1 && $promedio < 1.5){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-half-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 1.5 && $promedio < 2){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 2 && $promedio < 2.5){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-half-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 2.5 && $promedio < 3){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 3 && $promedio < 3.5){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-half-o text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 3.5 && $promedio < 4){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-o text-success"></i>';
    
                        }
    
                        else if($promedio >= 4 && $promedio < 4.5){
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star-half-o text-success"></i>';
    
                        }else{
    
                            echo '<i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>
                                  <i class="fa fa-star text-success"></i>';
    
                        }
                }

            ?>				
					
                    </a></li>
                    

			</ul>

			<br>

		</div>

		<div class="row comentarios">

		<?php

		foreach ($comentarios as $key => $value) {
			
			if($value["comentario"] != ""){

				$item = "id";
				$valor = $value["id_usuario"];

				$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

				echo '<div class="panel-group col-md-3 col-sm-6 col-xs-12 alturaComentarios">
				
					<div class="panel panel-default">
				      
				      <div class="panel-heading text-uppercase">

				      	'.$usuario["nombre"].'
				      	<span class="text-right">';

				      	if($usuario["modo"] == "directo"){

				      		if($usuario["foto"] == ""){

				      			echo '<img class="img-circle pull-right" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="20%">';	

				      		}else{

				      			echo '<img class="img-circle pull-right" src="'.$url.$usuario["foto"].'" width="20%">';	

				      		}
				      	
				      	}else{

				      		echo '<img class="img-circle pull-right" src="'.$usuario["foto"].'" width="20%">';	

				      	}

				      	echo '</span>

				      </div>
				     
				      <div class="panel-body"><small>'.$value["comentario"].'</small></div>

				      <div class="panel-footer">';
				      	
				      	switch($value["calificacion"]){

							case 0.5:
							echo '<i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 1.0:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 1.5:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 2.0:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 2.5:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 3.0:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 3.5:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 4.0:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
							break;

							case 4.5:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>';
							break;

							case 5.0:
							echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>
								  <i class="fa fa-star text-success" aria-hidden="true"></i>';
							break;

						}

				      echo '</div>
				    
				    </div>

				</div>';

			}
		}

		?>

		</div>

        
        
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

					<h1><small>Lo Sentimos!</small></h1>

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

					</li>';
				}
                
			echo ' </ul>';

		}

		?>

    </div>


</div>
<hr>


<!-- checaut comprar ahora -->

<div id="modalComprarAhora" class="modal fade modalFormulario" role="dialog" >	

	 <div class="modal-content modal-dialog">	 	

		<div class="modal-body modalTitulo">
		
			<h3 class="backColor">REALIZAR PAGO</h3>
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">

			<!-- mostrar carrito -->

			<?php
				$respuesta=ControladorCarrito::ctrMostrarTarifas();
				/*  :black">',$respuesta,"</div>"); */		

				echo '<input type="hidden" id="tasaImpuesto" value="'.$respuesta["impuesto"].'">
					  <input type="hidden" id="envioLocal" value="'.$respuesta["envioLocal"].'">
				      <input type="hidden" id="envioNacional" value="'.$respuesta["envioNacional"].'">
				      <input type="hidden" id="tasaMinimaLocal" value="'.$respuesta["tasaMinimaLocal"].'">
				      <input type="hidden" id="tasaMinimaNacional" value="'.$respuesta["tasaMinimaNacional"].'">
				      <input type="hidden" id="tasaRegion" value="'.$respuesta["region"].'">

				';

			?>

			<!-- formEnvio -->

				<div class="formEnvio row">

					<h4 class="text-center well text-muted text-uppercase">Información de envío</h4>

					<div class="col-xs-12 seleccionePais">



					</div>

				</div>
				<br>

					<div class="formaPago row">

						<h4 class="text-center well text-muted text-uppercase">Elige la forma de pago</h4>



						<figure class="col-xs-6" >
							
							<input id="checkPaypal" type="radio" name="pago" value="paypal" checked style="margin-left: 50%;">

							<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">
							
						</figure>		
						
						<figure class="col-xs-6">	
															
							<input id="checkPayu" type="radio" name="pago" value="payu"   style="margin-left: 50%;">						

							<img src="<?php echo $url; ?>vistas/img/plantilla/PayU.png" class="img-thumbnail">

						</figure>					

					</div>

					<br>

					<div class="listaProductos row">

						<h4 class="text-center well text-muted text-uppercase" style="color:#0d1117">Productos a comprar</h4>

						<table class="table table-striped tablaProductos" style="color:#0d1117">	

							<thead >	

									<tr>		
										<th style="color:black">Producto</th>
										<th style="color:black">Cantidad</th>
										<th style="color:black">Precio</th>
								</tr>	

							 </thead>	

						  	<tbody>		



							</tbody>	

						</table>	

							<div class="col-sm-6 col-xs-12 pull-right" >
						
								<table class="table table-striped tablaTasas">

									<tbody >

										<tr>
											<td>Subtotal</td>	
											<td><span class="cambioDivisa">PEN</span> S/.<span class="valorSubtotal" valor="0">0</span></td>	
										</tr>

										<tr>
											<td>Envío</td>	
											<td><span class="cambioDivisa">PEN</span> S/.<span class="valorTotalEnvio" valor="0">0</span></td>	
										</tr>

										<tr>
											<td>Impuesto</td>	
											<td><span class="cambioDivisa">PEN</span> S/.<span class="valorTotalImpuesto" valor="0">0</span></td>	
										</tr>

										<tr>
											<td><strong>Total</strong></td>	
											<td><strong><span class="cambioDivisa">PEN</span> S/.<span class="valorTotalCompra" valor="0">0</span></strong></td>	
										</tr>

									</tbody>	

								</table>

								 <div class="divisa">

								 	<select class="form-control" id="cambiarDivisa" name="divisa">

										<option value="PEN">PEN</option>

								 	</select>	

								 	<br>

								 </div>

							</div>				

						<div class="clearfix"></div>

						<button class="btn btn-block btn-lg btn-default backColor btnPagar" >Pagar</button>

					</div>

			</div>
			
		</div>
		<div class="modal-footer">
			
		</div>

	</div>	

</div>

<?php
/* https://developers.google.com/search/docs/data-types/product */
if($infoproducto["tipo"] == "fisico"){

	echo '<script type="application/ld+json">

			{
			  "@context": "http://schema.org/",
			  "@type": "Product",
			  "name": "'.$infoproducto["titulo"].'",
			  "image": [';

			  for($i = 0; $i < count($multimedia); $i ++){

			  	echo $servidor.$multimedia[$i]["foto"].',';

			  }
			
			  echo '],
			  "description": "'.$infoproducto["descripcion"].'"
	  
			}

		</script>';

}else{

	echo '<script type="application/ld+json">

			{
			  "@context": "http://schema.org",
			  "@type": "Course",
			  "name": "'.$infoproducto["titulo"].'",
			  "description": "'.$infoproducto["descripcion"].'",
			  "provider": {
			    "@type": "Organization",
			    "name": "Tu Logo",
			    "sameAs": "'.$url.$infoproducto["ruta"].'"
			  }
			}

		</script>';

}

?>

 