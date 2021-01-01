<?php

$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

?>
<!-- 
breadcrum  -->
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
<br>
<!-- selecion de perfil -->

<div class="container-fluid">
    <div class="container">

    
        <ul class="nav nav-tabs">

            <li class="active" >	  			
			  	<a data-toggle="tab" href="#compras" >

			  	<i class="fa fa-list-ul"></i> MIS COMPRAS</a>

	  		</li>

	  		<li> 				
		  		<a data-toggle="tab" href="#deseos">
		  		<i class="fa fa-gift"></i> MI LISTA DE DESEOS</a>
	  		</li>

	  		<li>				
	  			<a data-toggle="tab" href="#perfil">
	  			<i class="fa fa-user"></i> EDITAR PERFIL</a>
	  		</li>

	  		<li>				
		 	 	<a href="<?php echo $url; ?>ofertas">
		 	 	<i class="fa fa-star"></i>	VER OFERTAS</a>
	  		</li>


        </ul>

        <div class="tab-content">
            
          <!-- pestaña compras -->

		  <div id="compras" class="tab-pane fade in active">
		    
			<div class="panel-group">

			<?php

				$item = "id_usuario";
				$valor = $_SESSION["id"];

				$compras = ControladorUsuarios::ctrMostrarCompras($item, $valor);

				if(!$compras){

					echo '<div class="col-xs-12 text-center error404">
						   
						<h1><small>¡Oops!</small></h1>
				
						<h2>Aún no tienes compras realizadas en esta tienda</h2>

					  </div>';

				}else{

					foreach ($compras as $key => $value1) {

						$ordenar = "id";
						$item = "id";
						$valor = $value1["id_producto"];

						$productos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

						foreach ($productos as $key => $value2) {
						
							echo '<div class="panel panel-default">
									
									<div class="panel-body">

										<div class="col-md-2 col-sm-6 col-xs-12">

											<figure>
											
												<img class="img-thumbnail" src="'.$servidor.$value2["portada"].'">

											</figure>

										</div>

										<div class="col-sm-6 col-xs-12">

											<h1><small>'.$value2["titulo"].'</small></h1>

											<p>'.$value2["titular"].'</p>';

											if($value2["tipo"] == "virtual"){

												echo '<a href="'.$url.'/curso">
													<button class="btn btn-default pull-left">Ir al curso</button>
													</a>';

											}else{

												echo '<h6>Proceso de entrega: '.$value2["entrega"].' días hábiles</h6>';

												if($value1["envio"] == 0){

													echo '<div class="progress">

														<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Despachado
														</div>

														<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
															<i class="fa fa-clock-o"></i> Enviando
														</div>

														<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
															<i class="fa fa-clock-o"></i> Entregado
														</div>

													</div>';

												}

												if($value1["envio"] == 1){

													echo '<div class="progress">

														<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Despachado
														</div>

														<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Enviando
														</div>

														<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
															<i class="fa fa-clock-o"></i> Entregado
														</div>

													</div>';

												}

												if($value1["envio"] == 2){

													echo '<div class="progress">

														<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Despachado
														</div>

														<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Enviando
														</div>

														<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
															<i class="fa fa-check"></i> Entregado
														</div>

													</div>';

												}

											}

											echo '<h4 class="pull-right"><small>Comprado el '.substr($value1["fecha"],0,-8).'</small></h4>
															
										</div>

										<div class="col-md-4 col-xs-12">';

										$datos = array("idUsuario"=>$_SESSION["id"],
														"idProducto"=>$value2["id"] );

										$comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);

											echo '<div class="pull-right">

												<a class="calificarProducto" href="#modalComentarios" data-toggle="modal" idComentario="'.$comentarios["id"].'">
												
													<button class="btn btn-default backColor">Calificar Producto</button>

												</a>

											</div>

											<br><br>

											<div class="pull-right">

												<h3 class="text-right">';

												if($comentarios["calificacion"] == 0 && $comentarios["comentario"] == ""){

													echo '<i class="fa fa-star-o text-success" aria-hidden="true"></i>
															<i class="fa fa-star-o text-success" aria-hidden="true"></i>
															<i class="fa fa-star-o text-success" aria-hidden="true"></i>
															<i class="fa fa-star-o text-success" aria-hidden="true"></i>
															<i class="fa fa-star-o text-success" aria-hidden="true"></i>';

												}else{

													switch($comentarios["calificacion"]){

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


												}
											
													
												echo '</h3>

												<p class="panel panel-default text-right" style="padding:5px">

													<small>

													'.$comentarios["comentario"].'

													</small>
												
												</p>

											</div>

										</div>

									</div>

								</div>';

						}
						
					}
				}
			?>
			  
			

			</div>

		  </div>


          <!-- pestaña deseos --> 
          <div id="deseos" class="tab-pane fade">
            <h3>Deseos</h3>
            <p>Deseos</p>
          </div>
          <!-- pestaña perfil -->
          <div id="perfil" class="tab-pane fade">

                <div class="row">
					
					<form method="post" enctype="multipart/form-data">
					
						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPerfil">
								
							<?php

					
                            echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
                            <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
                            <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
                            <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">
                            ';


							if($_SESSION["modo"] == "directo"){

								if($_SESSION["foto"] != ""){

									echo '<img src="'.$url.$_SESSION["foto"].'" class="img-thumbnail">';

								}else{

									echo '<img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">';

								}
					

							}else{

								echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';
							}		

							?>

							</figure>

							<br>

							<?php

							if($_SESSION["modo"] == "directo"){
							
							echo '<button type="button" class="btn btn-default" id="btnCambiarFoto">
									
									Cambiar foto de perfil
									
									</button> ';

							}

							?>
                           
							<div id="subirImagen">
								
								<input type="file" class="form-control" id="datosImagen" name="datosImagen">

								<img style="border-top: 5px;margin-top:5px;" class="previsualizar">

							</div>
                           
						</div>	

						<div class="col-md-9 col-sm-8 col-xs-12">

						<br>
							
						<?php

						if($_SESSION["modo"] != "directo"){

							echo '<label class="control-label text-muted text-uppercase">Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["nombre"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
										<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>

									</div>

									<br>';
		

						}else{

							echo '<label class="control-label text-muted text-uppercase" for="editarNombre">Cambiar Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["nombre"].'">

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarEmail">Cambiar Correo Electrónico:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'" readonly>

									</div>

								<br>

								<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

								<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe la nueva contraseña">

									</div>

								<br>

								<button type="submit" class="btn btn-default backColor btn-md pull-left">Actualizar Datos</button>';

						}

						?>

						</div>

						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>					

					</form>

					<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

					<?php

						/* 	$borrarUsuario = new ControladorUsuarios();
							$borrarUsuario->ctrEliminarUsuario(); */

						?>	

				</div>
          

          </div>
        </div>
    </div>
</div>

<!-- comentarios -->
<div  class="modal fade modalFormulario" id="modalComentarios" role="dialog">

	<div class="modal-content modal-dialog">

	<div class="modal-body modalTitulo">

		<h3 class="backColor">CALIFICA ESTE PRODUCTO</h3>

		<button type="button" class="close" data-dismiss="modal">&times;</button>

		<form method="post" onsubmit="return validarComentario()">

			<input type="hidden" value="" id="idComentario" name="idComentario">
			<h1 class="text-center" id="estrellas">

		       		<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>

			</h1>

			<div class="form-group text-center">

		       		<label class="radio-inline"><input type="radio" name="puntaje" value="0.5">0.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.0">1.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.5">1.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.0">2.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.5">2.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.0">3.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.5">3.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.0">4.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.5">4.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="5.0" checked>5.0</label>
					
			</div><br>
			<div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comentario" name="comentario" maxlength="300" required></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

				</div>
				<?php

					/* 	$actualizarComentario = new ControladorUsuarios();
						$actualizarComentario -> ctrActualizarComentario(); */

				?>
		</form>
	</div>
	<!-- <div class="modal-footer">
      	
      	</div> -->
	</div>
</div>