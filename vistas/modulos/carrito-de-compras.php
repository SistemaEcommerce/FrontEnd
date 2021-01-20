<?php

$url = Ruta::ctrRuta();


?>
<!-- bradcrum -->
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

<!-- carrito de compras -->
<div class="container-fluid">
	<div class="container">
		<div class="panel panel-default">

			<!--
			CABECERA CARRITO DE COMPRAS
			-->

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


			<!--
			CUERPO CARRITO DE COMPRAS
			-->

			<div class="panel-body cuerpoCarrito">



			</div>

			<!--
			SUMA DEL TOTAL DE PRODUCTOS
			-->

			<div class="panel-body sumaCarrito">

				<div class="col-md-4 col-sm-6 col-xs-12 pull-right well" style="color:black;background-color: #0d1117;border:none;text-align: right;">

					<div class="col-xs-6">

						<h4>TOTAL:</h4>

					</div>

					<div class="col-xs-6" style="color:black;">

						<h4 class="sumaSubTotal">

							<!-- <strong>PEN S/.<span></span></strong> -->

						</h4>

					</div>

				</div>

			</div>

			<!--BOTÓN CHECKOUT-->

			<div class="panel-heading cabeceraCheckout" style="color:black;background-color: #0d1117;border:none;text-align: right;">

				<?php

				if (isset($_SESSION["validarSesion"])) {

					if ($_SESSION["validarSesion"] == "ok") {

						echo '<a id="btnCheckout" href="#modalCheckout" data-toggle="modal" idUsuario="' . $_SESSION["id"] . '"><button class="btn btn-default backColor btn-lg pull-right">REALIZAR PAGO</button></a>';
					}
				} else {

					echo '<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg pull-right">REALIZAR PAGO</button></a>';
				}

				?>

			</div>
		</div>
	</div>
</div>
<!-- ventana modal apra checaut -->

<div id="modalCheckout" class="modal fade modalFormulario" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 class="backColor">REALIZAR PAGO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">

				<!-- mostrar carrito -->

				<?php
				$respuesta = ControladorCarrito::ctrMostrarTarifas();
				/* var_dump('<div style="color:black">',$respuesta,"</div>"); */

				echo '<input type="hidden" id="tasaImpuesto" value="' . $respuesta["impuesto"] . '">
					  <input type="hidden" id="envioLocal" value="' . $respuesta["envioLocal"] . '">
				      <input type="hidden" id="envioNacional" value="' . $respuesta["envioNacional"] . '">
				      <input type="hidden" id="tasaMinimaLocal" value="' . $respuesta["tasaMinimaLocal"] . '">
				      <input type="hidden" id="tasaMinimaNacional" value="' . $respuesta["tasaMinimaNacional"] . '">
				      <input type="hidden" id="tasaRegion" value="' . $respuesta["region"] . '">

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

						<input id="checkPayu" type="radio" name="pago" value="payu"  style="margin-left: 50%;">

						<img src="<?php echo $url; ?>vistas/img/plantilla/PayU.png" class="img-thumbnail">

					</figure>
				<figure class="col-xs-6" >

						<input id="checkPaypal" type="radio" name="pago" value="paypal">

						<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" checked class="img-thumbnail">

					</figure>
				</div>

				<br>


				<div class="listaProductos row">

					<h4 class="text-center well text-muted text-uppercase" style="color:#0d1117">Productos a comprar</h4>

					<table class="table table-striped tablaProductos" style="color:#0d1117">

						<thead>

							<tr>
								<th style="color:black">Producto</th>
								<th style="color:black">Cantidad</th>
								<th style="color:black">Precio</th>
							</tr>

						</thead>

						<tbody>



						</tbody>

					</table>

					<div class="col-sm-6 col-xs-12 pull-right">

						<table class="table table-striped tablaTasas">

							<tbody>

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

							<select class="form-control" id="cambiarDivisa" name="divisa" style="display: none;">

								<!-- <option value="PEN">PEN</option> -->

							</select>

							<br>

						</div>

					</div>

					<div class="clearfix"></div>

					<form class="formPayu" style="display: none;">
					
						<input name="merchantId" type="hidden" value=""/>
						<input name="accountId" type="hidden" value=""/>
						<input name="description" type="hidden" value=""/>
						<input name="referenceCode" type="hidden" value=""/>	
						<input name="amount" type="hidden" value=""/>
						<input name="tax" type="hidden" value=""/>
						<input name="taxReturnBase" type="hidden" value=""/>
						<input name="shipmentValue" type="hidden" value=""/>
						<input name="currency" type="hidden" value=""/>
						<input name="lng" type="hidden" value="es"/>
						<input name="confirmationUrl" type="hidden" value="" />
						<input name="responseUrl" type="hidden" value=""/>
						<input name="declinedResponseUrl" type="hidden" value=""/>
						<input name="displayShippingInformation" type="hidden" value=""/>
						<input name="test" type="hidden" value="" />
						<input name="signature" type="hidden" value=""/>

					 	<input name="Submit" class="btn btn-block btn-lg btn-default backColor " type="submit"  value="PAGAR" >
					</form>
					<!-- pagar paypal -->
					<button class="btn btn-block btn-lg btn-default backColor btnPagar" >Pagar</button>

				</div>

			</div>

		</div>
		<div class="modal-footer">

		</div>

	</div>

</div>