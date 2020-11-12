
<div class="container-fluid barraSuperior" id="top">
	
	<div class="container">
		
		<div class="row">
	


			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
				
				<ul>	
					<?php
						$social=ControladorPlantilla::ctrEstiloPlantilla();

						$jsonRedesSociales=json_decode($social["redesSociales"],true);

						foreach ($jsonRedesSociales as $key => $value) {
							echo '	<li>
										<a href="'.$value["url"].'" target="_blank">

											<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>

										</a>
									</li>';
						}
					?>

				
				
				</ul>
			<!-- 	<ul>	<li>
						<a href="http://instagram.com/" target="_blank">
							<i class="fa fa-github redSocial youtubeGit" aria-hidden="true">YemerTRONCH</i>
						</a>
					</li></ul> -->


            </div>
         
			


			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro" id="registro">
				
				<ul>
					<li>|</li>
					<li><a  href="#modalIngreso" id="modalIngreso"  data-toggle="modal">Ingresar</a></li>
					<li>|</li>
					<li><a   href="#modalRegistro"  data-toggle="modal">Crear una cuenta</a></li>
					<li>|</li>

				</ul>

			</div>	

		</div>	

	</div>

</div>


<header class="container-fluid">
	
	<div class="container">
		
		<div class="row" id="cabezote">


			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
				
				<a href="#">
						
                <img src="http://localhost/SistemasPhp/SistemaEcommer/BackEnd/<?php echo $social["logo"] ?>" alt="Logo de la tienda" class="img-responsive">

				</a>
				
			</div>



			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					


				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
					
					<p>CATEGORÍAS
					
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					
					</p>

				</div>


				
				<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">
					
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">	

					<span class="input-group-btn">
						
						<a href="#">

							<button class="btn btn-default backColor" type="submit">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>

				</div>
			
			</div>



			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				
				<a href="#">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					
					</button>
				
				</a>	

				<p>TUS PRODUCTOS <span class="cantidadCesta">3</span> <br>S/. <span class="sumaCesta">20</span> PEN</p>	

			</div>

		</div>



		<div class="col-xs-12 backColor" id="categorias">

		<?php

			$categorias = ControladorProductos::ctrMostrarCategorias();
			
			foreach ($categorias as $key => $value) {
			
				/* var_dump(json_encode($value)); */
				echo '
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
				
					<h4>
						<a href="#" class="pixelCategorias">'.$value["categoria"].'</a>
					</h4>
				
					<hr>

					<ul>';

					$subcategorias = ControladorProductos::ctrMostrarSubCategorias($value["id"]);
				
						foreach ($subcategorias as $key => $value) {
							echo '<li><a href="#" class="pixelSubCategorias">'.$value["subcategoria"].'</a></li>';
						}
					
					echo'							
					</ul>
				</div>';
			}
		?>			


		</div>

	</div>

</header>


