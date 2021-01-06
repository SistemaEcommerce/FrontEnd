<?php
          
		   $url = Ruta::ctrRuta();

           
?>
<!-- bradcrum -->
<div class="container-fluid  well well-sm" style="background-color: #0d1117;border:0px;padding-top:15px;">
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

<!-- carrito de compras -->
<div class="container-fluid">
    <div class="container">
    <div class="panel panel-default">
			
			<!--=====================================
			CABECERA CARRITO DE COMPRAS
			======================================-->

			<div class="panel-heading cabeceraCarrito">
				
				<div class="col-md-6 col-sm-7 col-xs-12 text-center">
					
					<h3>
						<small>PRODUCTO</small>
					</h3>

				</div>

				<div class="col-md-2 col-sm-1 col-xs-0 text-center">
					
					<h3>
						<small>PRECIO</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>CANTIDAD</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>SUBTOTAL</small>
					</h3>

				</div>

			</div>


			<!--=====================================
			CUERPO CARRITO DE COMPRAS
			======================================-->

			<div class="panel-body cuerpoCarrito">
						
			

			</div>

			<!--=====================================
			SUMA DEL TOTAL DE PRODUCTOS
			======================================-->

			<div class="panel-body sumaCarrito" >

				<div class="col-md-4 col-sm-6 col-xs-12 pull-right well"  style="color:black;background-color: #0d1117;border:none;text-align: right;">
					
					<div class="col-xs-6">
						
						<h4>TOTAL:</h4>

					</div>

					<div class="col-xs-6" style="color:black;">

						<h4 class="sumaSubTotal">
							
							<strong>SOL S/.<span></span></strong>

						</h4>

					</div> 

				</div>

			</div>

			<!--=====================================
			BOTÓN CHECKOUT
			======================================-->

			<div class="panel-heading cabeceraCheckout" style="color:black;background-color: #0d1117;border:none;text-align: right;">
				
				<?php
		
					if(isset($_SESSION["validarSesion"])){
					
						if($_SESSION["validarSesion"] == "ok"){
						
							echo '<a id="btnCheckout" href="#modalCheckout" data-toggle="modal" idUsuario="'.$_SESSION["id"].'"><button class="btn btn-default backColor btn-lg pull-right">REALIZAR PAGO</button></a>';
						
						}
					
					
					}else{
					
						echo '<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg pull-right">REALIZAR PAGO</button></a>';
					}
					
				?>	

			</div>
		</div>
    </div>
</div>
<!-- ventana modal apra checaut -->

<div id="modalCheckout" class="modal fade modalFormulario" role="dialog" >	

	 <div class="modal-content modal-dialog">	 	

		<div class="modal-body modalTitulo">
		
			<h3 class="backColor">REALIZAR PAGO</h3>
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">

			<!-- formEnvio -->

				<div class="formEnvio row">

					<h4 class="text-center well text-muted text-uppercase">Información de envío</h4>

					<div class="col-xs-12 seleccionePais">

						<select class="form-control" name="" id="seleccionePais" required>

							<option value="">Seleccione una Region</option>

						</select>

					</div>

				</div>
				<br>

					<div class="formaPago row">

						<h4 class="text-center well text-muted text-uppercase">Elige la forma de pago</h4>


						<figure class="col-xs-6">	
															
							<input id="checkPayu" type="radio" name="pago" value="payu" checked  style="margin-left: 50%;">						

							<img src="<?php echo $url; ?>vistas/img/plantilla/payu.jpg" class="img-thumbnail">

						</figure>

						<figure class="col-xs-6" >
							
							<input id="checkPaypal" type="radio" name="pago" value="paypal"  style="margin-left: 50%;">

							<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">
							
						</figure>							

					</div>

					<br>

					<div class="listaProducto row">

						<h4 class="text-center well text-muted text-uppercase" style="color:#0d1117">Productos a comprar</h4>

						<table class="table table-striped tablaProductos" style="color:#0d1117">	

							<thead >	

									<tr>		
										<th>Producto</th>
										<th>Cantidad</th>
										<th>Precio</th>
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
											<td><span class="cambioDivisa">SOL</span> S/.<span class="valorSubtotal" valor="0">0</span></td>	
										</tr>

										<tr>
											<td>Envío</td>	
											<td><span class="cambioDivisa">SOL</span> S/.<span class="valorTotalEnvio" valor="0">0</span></td>	
										</tr>

										<tr>
											<td>Impuesto</td>	
											<td><span class="cambioDivisa">SOL</span> S/.<span class="valorTotalImpuesto" valor="0">0</span></td>	
										</tr>

										<tr>
											<td><strong>Total</strong></td>	
											<td><strong><span class="cambioDivisa">SOL</span> S/.<span class="valorTotalCompra" valor="0">0</span></strong></td>	
										</tr>

									</tbody>	

								</table>

								 <div class="divisa">

								 	<select class="form-control" id="cambiarDivisa" name="divisa">

										

								 	</select>	

								 	<br>

								 </div>

							</div>				

						<div class="clearfix"></div>

						<button class="btn btn-block btn-lg btn-default backColor btnPagar">Pagar</button>

					</div>

			</div>
			
		</div>
		<div class="modal-footer">
			
		</div>

	</div>	

</div>