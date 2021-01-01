<?php
$servidor=Ruta::ctrRutaServidor();
$url=Ruta::ctrRuta();

$ruta=$rutas[0];
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
<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid well well-sm barraProductos" >

	<div class="container">

		<div class="row">
            <div class="col-sm-6 col-xs-12">
                 <div class="btn-group" style="background-color: #0d1117;">
					
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                     Ordenar Productos <span class="caret"></span></button>

                     <ul class="dropdown-menu" role="menu" >

                        <?php
                         
                             echo '<li><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
                                   <li><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

                        ?>

                     </ul>

               </div>
            </div>
    	        <div class="col-sm-6 col-xs-12 organizarProductos">
	
                    
                    
    	            <div class="btn-group pull-right">

						 <button type="button" class="btn btn-default btnGrid" id="btnGrid0">

							<i class="fa fa-th" aria-hidden="true"></i>  

							<span class="col-xs-0 pull-right"> GRID</span>

						 </button>

						 <button type="button" class="btn btn-default btnList" id="btnList0">

							<i class="fa fa-list" aria-hidden="true"></i> 

							<span class="col-xs-0 pull-right"> LIST</span>

						 </button>

					</div>		

				</div>

		</div>

	</div>

</div>


<div class="container-fluid productos">

	<div class="container" >
		
		<div class="row"  >
            
            <ul class="breadcrumb fondoBreadcrumb  text-uppercase" style="background-color:#0d1117;padding-top:0px;padding-bottom:0px;border:none;top:-30px;margin-bottom:0px;font-size:25px;">
				
				<li  style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"><a href="<?php echo $url;?>">INICIO</a></li>
				<li  class="active pagActiva" style="background-color:#0d1117; color:#ffffff; border:none;padding-left:20px;padding-top:1px;"> <?php echo $rutas[0] ?></li>

            </ul >
        
            <?php
                /* rutas */
                if (isset($rutas[1])) {
                    //$_SESSION["ordenar"]="DESC";

                    if (isset($rutas[2])) {

                        if ($rutas[2]=="antiguos") {

                            $modo="ASC";
                            $_SESSION["ordenar"]="ASC";
                            
                        }else{

                            $modo="DESC";
                            $_SESSION["ordenar"]="DESC";
                            
                        }
                    }else{
                        if (isset($_SESSION["ordenar"])) {
                        
                            $modo=$_SESSION["ordenar"];
                        }else{
                            $modo="DESC";

                        }
                        

                    }
                    $base=($rutas[1]-1)*12;
                    $tope=12;
                }else{

                    $rutas[1]=1;
                    $base=0;
                    $tope=12;
                    $modo="DESC";
                }
                /* llamar a categorias sub cat dest */
                if ( $rutas[0] == "articulos-gratis") {
                
                    $item2 = "precio";
                    $valor2 = 0;
                    $ordenar="id";
                
                
                }else if (  $rutas[0]=="lo-mas-vendidos") {
                
                    $item2 = null;
                    $valor2 = null;
                    $ordenar="ventas";
                
                }else if (  $rutas[0]=="lo-mas-visto") {
                
                    $item2 = null;
                    $valor2 = null;
                    $ordenar="vistas";
                
                }else if (  $rutas[0]=="articulos-oferta") {
                
                    $item2 =null ;
                    $valor2 = null;
                    $ordenar="oferta";
                
                }else{
                    $ordenar="id";
                    $item1="ruta";
                    $valor1=$rutas[0];
                    $categoria=ControladorProductos::ctrMostrarCategorias($item1, $valor1);

                    if (!$categoria) {
                        $subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);

                        $item2 = "id_subcategoria";
                        $valor2 = $subCategoria[0]["id"];
                    } else {
                        $item2 = "id_categoria";
                        $valor2 = $categoria["id"];
                    }
                }
                  
                    $productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2,$base,$tope,$modo);
                    $listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);
                    
                    if(!$productos){

                        echo '
                        <div class="col-xs-12 error404 text-center ">

                            <h1><small>¡Atencion!</small></h1>

                            <h2>Aún no hay productos en esta sección</h2>

                        </div>';

                    }else{
                        echo'
                        <ul class="grid0" style="color:#000;">';

                        foreach ($productos as $key => $value) {
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
                                echo'<h2><small>GRATIS</small></h2> <br><br><br> ';
                                }else{
                                    if ($value["oferta"]!=0) {
                                        echo'<h2><small>
                                                 <strong class="oferta" style="padding-left:5px;padding-right:5px ;border-radius:30px;color:red;font-size:15px;background-color:rgb(76, 199, 117)"> S/.'.$value["precio"].' SOL 
                                                 </strong>
                                             </small></h2>
                                             <small style="color:green ;font-size:26px;">  S/.'.$value["precioOferta"].' SOL</small><br> <br>  
                                             ';
                                    }else{
            
                                        echo'<h2><small style="color:green;font-size:20px">S/.'.$value["precio"].' SOL</small></h2> <br><br>  <br>';
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
            
                            </li>
                            ';
                        }
            
                        echo'
                
            
                        </ul>
            
            
            
                        <ul class="list0" style="display:none">';
            
                        foreach ($productos as $key => $value) {
            
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
            
                                    
                                            echo '<a href="'.$url.$value["ruta"].'" class="pixelProducto">
            
                                              <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
            
                                              <i class="fa fa-eye" aria-hidden="true"></i>
            
                                              </button>
            
                                          </a>
                                    
                                    </div>
            
                                </div>
            
                                <div class="col-xs-12"><hr></div>
            
                            </li>
                           
                            ';
            
                        }
            
                        echo '</ul>
                        ';
            
                   
                    }               

            ?>
            <div class="clearfix"></div>
            <!-- pag -->

            <div class="centrado">
                 <!-- paginacion  -->
                    <?php

				            if(count($listaProductos) != 0){
                            
				            	$pagProductos = ceil(count($listaProductos)/12);
                            
				            	if($pagProductos > 4){
                                
				            		/*=============================================
				            		LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
				            		=============================================*/
                                
				            		if($rutas[1] == 1){
                                    
				            			echo '<ul class="pagination">';
                                    
				            			for($i = 1; $i <= 4; $i ++){
                                        
				            				echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
                                        
				            			}
                                    
				            			echo ' <li class="disabled"><a>...</a></li>
				            				   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
				            				   <li><a href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right" aria-hidden="true" ></i></a></li>
                                    
				            			</ul>';
                                    
				            		}
                                
				            		/*=============================================
				            		LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
				            		=============================================*/
                                
				            		else if($rutas[1] != $pagProductos && 
				            			    $rutas[1] != 1 &&
				            			    $rutas[1] <  ($pagProductos/2) &&
				            			    $rutas[1] < ($pagProductos-3)
				            			    ){
                                            
				            				$numPagActual = $rutas[1];
                                            
				            				echo '<ul class="pagination">
				            					  <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
                                            
				            				for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
                                            
				            					echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
                                            
				            				}
                                        
				            				echo ' <li class="disabled"><a>...</a></li>
				            					   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
				            					   <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                        
				            				</ul>';
                                        
				            		}
                                
				            		/*=============================================
				            		LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
				            		=============================================*/
                                
				            		else if($rutas[1] != $pagProductos && 
				            			    $rutas[1] != 1 &&
				            			    $rutas[1] >=  ($pagProductos/2) &&
				            			    $rutas[1] < ($pagProductos-3)
				            			    ){
                                            
				            				$numPagActual = $rutas[1];
                                            
				            				echo '<ul class="pagination">
				            				   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
				            				   <li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
				            				   <li class="disabled"><a>...</a></li>
				            				';
                                            
				            				for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
                                            
				            					echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
                                            
				            				}
                                        
                                        
				            				echo '  <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				            					</ul>';
				            		}
                                
				            		/*=============================================
				            		LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
				            		=============================================*/
                                
				            		else{
                                    
				            			$numPagActual = $rutas[1];
                                    
				            			echo '<ul class="pagination">
				            				   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
				            				   <li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
				            				   <li class="disabled"><a>...</a></li>
				            				';
                                    
				            			for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){
                                        
				            				echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
                                        
				            			}
                                    
				            			echo ' </ul>';
                                    
				            		}
                                
				            	}else{
                                
				            		echo '<ul class="pagination">';
                                
				            		for($i = 1; $i <= $pagProductos; $i ++){
                                    
				            			echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';
                                    
				            		}
                                
				            		echo '</ul>';
                                
				            	}
                            
				            }
                        
		        	?>          
    
            </div>       
                  
                    

          
        </div>  

    </div>  

</div>