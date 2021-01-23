<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();
/* inicio de secion usuario */
if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}

/*API DE GOOGLE
https://github.com/googleapis/google-api-php-client
https://console.developers.google.com/apis/credentials?project=sistemaventas-300000
*/
/* CREAR API DE GOOGLE */
$cliente = new Google_Client();
$cliente->setAuthConfig('modelos/client_secret.json');
$cliente->setAccessType("offline");
$cliente->setScopes(['profile','email']);
/*=============================================
RUTA PARA EL LOGIN DE GOOGLE
=============================================*/
$rutaGoogle = $cliente->createAuthUrl();

/* recibimos la variable get de google llamada code */
if(isset($_GET["code"])){

	$token = $cliente->authenticate($_GET["code"]);

	$_SESSION['id_token_google'] = $token;

	$cliente->setAccessToken($token);

}
/* recibimos los datos de google */

if($cliente->getAccessToken()){

	$item = $cliente->verifyIdToken();

	$datos = array("nombre"=>$item["name"],
					"email"=>$item["email"],
					"foto"=>$item["picture"],
					"password"=>"null",
					"modo"=>"google",
					"verificacion"=>0,
					"emailEncriptado"=>"null",
					"passwordNormal"=>"null");

	$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);
	
		echo '<script>
		
		setTimeout(function(){
	
			window.location = localStorage.getItem("rutaActual");
	
		},1000);
	
		 </script>';
	


}

?>

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

				<li><a href="<?php echo $url; ?>contactanos">Contactanos</a></li>
				
				</ul>
			


            </div>
         
			


			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro" id="registro">
				
				<ul>
					<?php

						if (isset($_SESSION["validarSesion"])) {

								if ($_SESSION["validarSesion"]=="ok") {

									if ($_SESSION["modo"]=="directo") {

										if ($_SESSION["foto"]!="") {

											echo '<li>

													<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">

									 			</li>';
										}else{
											echo '<li>

												  	<img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">
												  
												  </li>';
										}
										echo '	<li>|</li>
											 	<li><a href="'.$url.'perfil">Ver Perfil</a></li>
											 	<li>|</li>
											 	<li><a href="'.$url.'salir">Salir</a></li>';
										
									}
									if($_SESSION["modo"] == "facebook"){

										echo '<li>
			
												<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">
			
											   </li>
											   <li>|</li>
												<li><a href="'.$url.'perfil">Ver Perfil</a></li>
												<li>|</li>
												<li><a href="'.$url.'salir" class="salir">Salir</a></li>';
			
									}
			
									if($_SESSION["modo"] == "google"){
			
										echo '<li>
			
												<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">
			
											   </li>
											   <li>|</li>
												<li><a href="'.$url.'perfil">Ver Perfil</a></li>
												<li>|</li>
												<li><a href="'.$url.'salir">Salir</a></li>';
			
									}
											   

								}
								
						}else{
							echo'
							<li><a  href="#modalIngreso"  data-toggle="modal">Ingresar</a></li>
							<li>|</li>
							<li><a  href="#modalRegistro"  data-toggle="modal">Crear una cuenta</a></li>
							';
						}
					?>
					
					
					

				</ul>

			</div>	

		</div>	

	</div>

</div>


<header class="container-fluid" >
	
	<div class="container">
		
		<div class="row" id="cabezote" >


			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo" >
				
				<a href="<?php echo $url; ?>">
						
                <img src="<?php echo $servidor.$social["logo"] ?>" alt="Logo de la tienda" class="img-responsive">

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
						
						<a href="<?php echo $url; ?>buscador/1/recientes">

							<button class="btn btn-default backColor" type="submit">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>

				</div>
			
			</div>



			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				
				<a href="<?php echo $url;?>carrito-de-compras">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					
					</button>
				
				</a>	

				<p>TUS PRODUCTOS <span class="cantidadCesta"></span> <br>S/. <span class="sumaCesta"></span> SOL</p>	

			</div>

		</div>



		<div class="col-xs-12 backColor" id="categorias">

			<?php
				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
						
				foreach ($categorias as $key => $value) {


					echo '
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

								<h4>
									<a href="'.$url.$value["ruta"].'" class="pixelCategorias" titulo="'.$value["categoria"].'">'.$value["categoria"].'</a>
								</h4>

								<hr>

								<ul>';

						$item="id_categoria";
						$valor=$value["id"];

						$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
							foreach ($subcategorias as $key => $value) {
								echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias" titulo="'.$value["subcategoria"].'">'.$value["subcategoria"].'</a></li>';						}
							
						echo'							
						</ul>
					</div>';
				}
			?>			


		</div>

	</div>

</header>

<!-- registro DIRECTO -->

<div class="modal fade modalFormulario" id="modalRegistro" role="dialog" >

    <div class="modal-content modal-dialog" >      	
      	  	<!-- Modal body -->
      	  	<div class="modal-body modalTitulo" >
				
				<h3 class="backColor">Registrarse</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<!-- registro facebok -->
				<div class="col-sm-6 col-xs-12 facebook" >

					
					<p> 
						<i class="fa fa-facebook"></i> Facebook
					</p>
				</div>
				<!-- registro google -->
				<a href="<?php echo $rutaGoogle; ?>">
				
					<div class="col-sm-6 col-xs-12 google">
						
						<p>
						  <i class="fa fa-google"></i>
							Registro con Google
						</p>
				
					</div>
				</a>
				<!-- registro directo -->
				<form method="post" onsubmit="return registroUsuario()" style="margin:15px;">
				<hr>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user" style="color: #000;"></i>
							</span>
							<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope" style="color: #000;"></i>
							</span>
							<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>
						
							
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								
								<i class="glyphicon glyphicon-lock" style="color: #000;"></i>
							</span>
							<input type="password" class="form-control " id="regPassword" name="regPassword" placeholder="Contraseña" required>
						</div>
					</div>

					<?php
						$registro=new ControladorUsuarios();
						$registro->ctrRegistroUsuario();
					?>

					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">
					<hr>
				</form>
      	  	</div>
				<div class="checkBox" style="margin-left:25px;">
					<label>
					
						<input  name="" id="regPoliticas" type="checkbox">
						<small style="color: black;"> Aceptas las politicas de privacidad</small>
						<a href="#politicas" data-toggle="modal" style="font-size:20px">LEER MAS</a>

					</label>
				</div>
				
      	  	<!-- Modal footer -->
      	  	<div class="modal-footer" style="color: #000;">
					Ya tienes una cuenta Registrada| <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>
      	  	  <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
      	  	</div>
			
      	
    </div>
</div>
<!-- politicas de privacidad -->
<div class="modal fade modalFormulario" id="politicas" role="dialog" >
	<div class="modal-content modal-dialog" >      	
      	  
        <div class="modal-header"  style="background-color: #46639f;color:#fff; ">
         
			  <button type="button" class="close" data-dismiss="modal">×</button>
			<strong>
				<h3  style="color: #fff;font-size:25px;">Politicas de privacidad de la Tienda Virtual</h3>
			</strong>
			  <h5  style="color: #fff;font-size:13px;">Esta Aplicación recoge algunos Datos Personales de sus Usuarios.

			</h5>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" class="mosalesbody" style="background-color: #222;">
          <strong >
			  <p style="color: #fff;">
			  Datos Personales recogidos para las siguientes finalidades y utilizando los siguientes servicios:
			  </p>
		  </strong>
		  <ul class="politicas">
			  <li style="color: #fff;margin-left:15px;padding-left:15px;margin-top:15px;" >
			  
				  <i class="glyphicon glyphicon-user" style="color: #fff;font-size:30px"></i>
				  Acceso a las cuentas de servicios de terceros
				  <p style="margin-top: -5px;margin-left:22px;">
				  Acceso a la cuenta de Facebook				
				</p>
				<p style="margin-top: -15px;margin-left:22px;">
					Permisos: Acerca de mí
				</p>
			  </li>
			  <li style="color: #fff;margin-left:15px;padding-left:15px;margin-top:15px;" >
				  <i class="glyphicon glyphicon-envelope" style="color: #fff;font-size:30px"></i>
				  Contactar con el Usuario
				  <p style="margin-top: -5px;margin-left:22px;">
				  Formulario de contacto
				  </p>
				  <p style="margin-top: -10px;margin-left:22px;">
				  Datos Personales: dirección de correo electrónico
				  </p>

			  </li>
			  <li style="color: #fff;margin-left:15px;padding-left:15px;margin-top:15px;" >
				  <i class="glyphicon glyphicon-lock" style="color: #fff;font-size:30px"></i>
				  Interacción con redes sociales y plataformas externas

				  <p style="margin-top: -5px;margin-left:22px;">
				  Botón “Me gusta” y widgets sociales de Facebook
				  </p>
				  <p style="margin-top: -10px;margin-left:22px;">
				  Datos Personales: Cookies; Datos de uso
				  </p>
			  </li>
		  </ul>
		 
		 
		  <hr>
			<ul class="politicas">
				<li style="color: #fff;margin-left:15px;padding-left:15px;margin-top:15px;" >
				<i class="glyphicon glyphicon-user" style="color: #fff;font-size:30px;"></i>
					Roma Jean
				
				  <p style="margin-top: -5px;margin-left:30px;">
				  Tienda Virtual Roma Jeans
				  </p>
				  <p style="margin-top: -13px;margin-left:30px;">
				  	Roma Jean
				  </p>
				  <p style="margin-top: -13px;margin-left:30px;">
				 	 Romajeansof@gmail.com
				  </p>
				  <p style="margin-top: -13px;margin-left:30px;">
				  	922679390
				  </p>
				</li>
			</ul>
        </div>
		
        <!-- Modal footer -->
        <div class="modal-footer" style="background-color: #222;">
			Tienda Virtual de Ropas
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		
		</div>
</div>
<!-- fin de politicas de privacidad -->
<!-- mosal ingreso -->
<div class="modal fade modalFormulario" id="modalIngreso" role="dialog" >

    <div class="modal-content modal-dialog" >      	
      	  	<!-- Modal body -->
      	  	<div class="modal-body modalTitulo" >
				
				<h3 class="backColor">Ingresar</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<!-- ingreso facebok -->
				<div class="col-sm-6 col-xs-12 facebook" >

					
					<p> 
						<i class="fa fa-facebook"></i> Facebook
					</p>
				</div>
				<!-- insgreso google -->
				<a href="<?php echo $rutaGoogle; ?>">
				
				<div class="col-sm-6 col-xs-12 google">
					
					<p>
					  <i class="fa fa-google"></i>
						 Google
					</p>
			
				</div>
				</a>
			
				<!-- ingreso directo -->

				<form method="post"  style="margin:15px;">
				<hr>
				
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope" style="color: #000;"></i>
							</span>
							<input type="email" class="form-control " id="ingEmail" name="ingEmail" placeholder="Correo Electronico" required>
							
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								
								<i class="glyphicon glyphicon-lock" style="color: #000;"></i>
							</span>
							<input type="password" class="form-control " id="ingPassword" name="ingPassword" placeholder="Contraseña" required>
						</div>
					</div>

					<?php
						$registro=new ControladorUsuarios();
						$registro->ctrIngresoUsuario();
					?>

					<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">
					<div style="text-align: center;margin-top:15px">

						<a  href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>
					</div>
		
				</form>
      	  	</div>
		
				
      	  	<!-- Modal footer -->
			
			<div class="modal-footer" style="color: #000;">
					Ya tienes una cuenta Registrada?| <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registro</a></strong>
      	  	 		 <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
      	  	</div>
      	
    </div>
</div>

<!-- olvido de contraseña -->
<div class="modal fade modalFormulario" id="modalPassword" role="dialog" style="color: #000;">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo" >

        	<h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

			<form method="post" style="border: 15px;margin:15px;">

				<label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope" style="color: #000;"></i>
						
						</span>
					
						<input  type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>			

				<?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword(); 

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>

        </div>

        <div class="modal-footer" style="color: #000;">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>