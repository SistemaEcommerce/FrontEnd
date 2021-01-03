<?php

class ControladorUsuarios{

    public function ctrRegistroUsuario() {

		$url=Ruta::ctrRuta();
		$servidor = Ruta::ctrRutaServidor();

        if (isset($_POST["regUsuario"])) {
			
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["regUsuario"]) &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){


                $encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $encriptarEmail = md5($_POST["regEmail"]);
 
                $datos = array("nombre"=>$_POST["regUsuario"],
							   "password"=> $encriptar,
							   "email"=> $_POST["regEmail"],
							   "foto"=>"",
							   "modo"=> "directo",
							   "verificacion"=> 1,
							   "emailEncriptado"=>$encriptarEmail,
							   "passwordNormal"=>$_POST["regPassword"]);
        	$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

			if($respuesta == "ok"){
			
				$social=ControladorPlantilla::ctrEstiloPlantilla();

				/* verficacion de correo */
					date_default_timezone_set("America/Lima");
					$mail=new PHPMailer;
					$mail->CharSet = 'UTF-8';
					$mail->isMail();
					$mail->setFrom('bryancapchataype@gmail.com','BRYANCTDEV');
					$mail->addReplyTo('bryancapchataype@gmail.com','BRYANCTDEV');
					$mail->Subject="Por Favor verifique su direccion de correo electrocino";
					$mail->addAddress($_POST["regEmail"]);

					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
										<center>

											<img style="padding:20px; width:10%" src="'.$servidor.$social["logo"].'">

										</center>

										<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

											<center>

											<img style="padding:20px; width:15%" src="'.$servidor.'vistas/img/plantilla/email.png">

											<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

											<hr style="border:1px solid #ccc; width:80%">

											<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico</h4>

											<a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration:none">

											<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>

											</a>

											<br>

											<hr style="border:1px solid #ccc; width:80%">

											<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

											</center>

										</div>

									</div>');
									$envio=$mail->Send();
									if (!$envio) {

										echo '<script> 

												swal({
													  title: "¡ERROR!",
													  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
													  type:"success",
													  confirmButtonText: "Cerrar",
													  closeOnConfirm: false
													},
												
													function(isConfirm){
													
														if(isConfirm){
															history.back();
														}
												});
											
											</script>';
											
				
									}else{

										echo '<script> 

												swal({
													  title: "¡OK!",
													  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
													  type:"success",
													  confirmButtonText: "Cerrar",
													  closeOnConfirm: false
													},
												
													function(isConfirm){
													
														if(isConfirm){
															history.back();
														}
												});
											
											</script>';
									}			

			}
            }else{
			
				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al registrar el usuario, no se permiten caracteres especiales! email->'.$_POST["regEmail"].'<-password-'.$_POST["regPassword"].'-usuario-'.$_POST["regUsuario"].'",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}
	/* mostrar usuarios */

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}
	/* actualizar usuarios */

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}/* inrgeso */
	public function ctrIngresoUsuario(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){

					if($respuesta["verificacion"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["email"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["modo"] = $respuesta["modo"];

						echo '<script>
							
							window.location = localStorage.getItem("rutaActual");

						</script>';

					}

				}else{

					echo'<script>

							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("rutaActual");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}
	public function ctrOlvidoPassword(){

		if(isset($_POST["passEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){
			
				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($pattern)-1;

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}
				$nuevaPassword = generarPassword(11);
				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item1 = "email";
				$valor1 = $_POST["passEmail"];

				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);
				if($respuesta1){

					$id = $respuesta1["id"];
					$item2 = "password";
					$valor2 = $encriptar;
	
					$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

					/* respuestas otro */
					$item3="passwordNormal";
					$valor3=$nuevaPassword;
					$respuesta3=ModeloUsuarios::mdlActualizarUsuario2($tabla, $id, $item3, $valor3);

					if($respuesta2  == "ok"){

						date_default_timezone_set("America/Lima");
						$url=Ruta::ctrRuta();
						$servidor = Ruta::ctrRutaServidor();
						$mail=new PHPMailer;
						$mail->CharSet = 'UTF-8';
						$mail->isMail();
						$mail->setFrom('bryancapchataype@gmail.com','BRYANCTDEV');
						$mail->addReplyTo('bryancapchataype@gmail.com','BRYANCTDEV');
						$mail->Subject="Solicitud de nueva contraseña";
						$mail->addAddress($_POST["passEmail"]);
	
						$mail->msgHTML('

								<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

									<center>

										<img style="padding:20px; width:10%" src="'.$servidor.'vistas/img/plantilla/logo.png">

									</center>

									<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

										<center>

											<img style="padding:20px; width:15%" src="'.$servidor.'vistas/img/plantilla/email.png">

										<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

										<hr style="border:1px solid #ccc; width:80%">

										<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>'.$nuevaPassword.'</h4>

										<a href="'.$url.'" target="_blank" style="text-decoration:none">

										<div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

										</a>

										<br>

										<hr style="border:1px solid #ccc; width:80%">

										<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

										</center>

									</div>

								</div>');
										$envio=$mail->Send();
										if (!$envio) {
	
											echo '<script> 
	
															swal({
																  title: "¡ERROR!",
																  text: "¡Ha ocurrido un problema enviando cambio de contraseña a '.$_POST["passEmail"].''.$mail->ErrorInfo.'!",
																  type:"error",
																  confirmButtonText: "Cerrar",
																  closeOnConfirm: false
																},
															
																function(isConfirm){
																
																	if(isConfirm){
																		history.back();
																	}
															});
														
													</script>';
					
										}else{
	
											echo '<script> 
	
														swal({
															  title: "¡ok!",
															  text: "Por favor revise la vandeja de entrada o la carpeta de SPAM de su correo electronico '.$_POST["regEmail"].'  para su cambio de contraseña!",
															  type:"success",
															  confirmButtonText: "Cerrar",
															  closeOnConfirm: false
															},
														
															function(isConfirm){
															
																if(isConfirm){
																	history.back();
																}
														});
													
												</script>';
	
										}	

					}
				}else{
					echo '<script> 

					swal({
						  title: "¡ERROR!",
						  text: "¡Error el correo electronico no existe en el Sistema!",
						  type:"error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						},

						function(isConfirm){

							if(isConfirm){
								history.back();
							}
					});

			</script>';
				}



			}else{
				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al enviar el correo, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}
	}
	static public function ctrRegistroRedesSociales($datos){

		$tabla = "usuarios";
		$item = "email";
		$valor = $datos["email"];
		$emailRepetido = false;

		$respuesta0 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		if($respuesta0){

			if($respuesta0["modo"] != $datos["modo"]){

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico '.$datos["email"].', ya está registrado en el sistema con un método diferente a Google!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

				$emailRepetido = false;

			}

			$emailRepetido = true;

		}else{

			$respuesta1 = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

		}

		if($emailRepetido || $respuesta1 == "ok"){

			$respuesta2 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

			if($respuesta2["modo"] == "facebook"){

				session_start();

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["password"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "ok";

			}else if($respuesta2["modo"] == "google"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["password"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "<span style='color:white'>ok</span>";

			}

			else{

				echo "";
			}

		}
	}
	/* actualizar perfil */
	public function ctrActualizarPerfil(){

		if(isset($_POST["editarNombre"])){

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = $_POST["fotoUsuario"];

			if(isset($_FILES["datosImagen"]["tmp_name"]) && !empty($_FILES["datosImagen"]["tmp_name"])){

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				$directorio = "vistas/img/usuarios/".$_POST["idUsuario"];

				if(!empty($_POST["fotoUsuario"])){

					unlink($_POST["fotoUsuario"]);
				
				}else{

					mkdir($directorio,0755);

				}

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$aleatorio = mt_rand(100, 999);

				if($_FILES["datosImagen"]["type"] == "image/jpeg"){

					$ruta = "vistas/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".jpg";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/


					$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["datosImagen"]["type"] == "image/png"){

					$ruta = "vistas/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".png";

					/*=============================================
					MOFICAMOS TAMAÑO DE LA FOTO
					=============================================*/

					$origen = imagecreatefrompng($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
    			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			if($_POST["editarPassword"] == ""){

				$password = $_POST["passUsuario"];
/* 				$encriptar = crypt($_POST["passUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
 */				$passwordNormal=$_POST["passUsuario"];
			}else{

				$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$passwordNormal=$_POST["editarPassword"];
			}

			
		
			$datos = array("nombre" => $_POST["editarNombre"],
						   "email" => $_POST["editarEmail"],
						   "password" => $password,
						   "foto" => $ruta,
						   "passwordNormal" => $passwordNormal,
						   "id" => $_POST["idUsuario"]);


			$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $datos["id"];
				$_SESSION["nombre"] = $datos["nombre"];
				$_SESSION["foto"] = $datos["foto"];
				$_SESSION["email"] = $datos["email"];
				$_SESSION["password"] = $datos["password"];
				$_SESSION["passwordNormal"] = $datos["passwordNormal"];
				$_SESSION["modo"] = $_POST["modoUsuario"];
/* 				text: "¡Su cuenta ha sido actualizada correctamente!'.$password.'---'.$passwordNormal.'--'.$_POST["idUsuario"].'",
 */
				echo '<script> 
						swal({
							  title: "¡OK!",
							  text: "¡Su cuenta ha sido actualizada correctamente!",
							  type:"success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},
							function(isConfirm){
								if(isConfirm){
									history.back();
								}
						});
				</script>';


			}
			
		}

	}
	/* compras */

	static function ctrMostrarCompras( $item, $valor){

		$tabla = "compras";

		$respuesta = ModeloUsuarios::mdlMostrarCompras($tabla, $item,$valor);

		return $respuesta;
	}
	static public function ctrMostrarComentariosPerfil($datos){

		$tabla = "comentarios";

		$respuesta = ModeloUsuarios::mdlMostrarComentariosPerfil($tabla, $datos);

		return $respuesta;

	}
	/* actualizar */
	public function ctrActualizarComentario(){

		if(isset($_POST["idComentario"])){

			if(preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["comentario"])){

				if($_POST["comentario"] != ""){

					$tabla = "comentarios";

					$datos = array("id"=>$_POST["idComentario"],
								   "calificacion"=>$_POST["puntaje"],
								   "comentario"=>$_POST["comentario"]);

				   $respuesta = ModeloUsuarios::mdlActualizarComentario($tabla, $datos);

                   if ($respuesta == "ok") {
					echo'<script>

					swal({
						  title: "¡GRACIAS POR COMPARTIR SU OPINIÓN!",
						  text: "¡Su calificación y comentario ha sido guardado!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							   history.back();
							  } 
					});

				  </script>';
                   }

				}else{

					echo'<script>

						swal({
							  title: "¡ERROR AL ENVIAR SU CALIFICACIÓN!",
							  text: "¡El comentario no puede estar vacío!",
							  type: "error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								   history.back();
								  } 
						});

					  </script>';

				}	

			}else{

				echo'<script>

						swal({
							  title: "¡ERROR AL ENVIAR SU CALIFICACIÓN!",
							  text: "¡El comentario no puede estar vacío!",
							  type: "error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								   history.back();
								  } 
						});

					  </script>';

			}

		}
	}
	static public function ctrAgregarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlAgregarDeseo($tabla, $datos);

		return $respuesta;

	}
	static public function ctrMostrarDeseos($item){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlMostrarDeseos($tabla, $item);

		return $respuesta;

	}
	static public function ctrQuitarDeseo($datos){

		$tabla = "deseos";

		$respuesta = ModeloUsuarios::mdlQuitarDeseo($tabla, $datos);

		return $respuesta;

	}
	public function ctrEliminarUsuario(){

		if(isset($_GET["id"])){

			$tabla1 = "usuarios";		
			$tabla2 = "comentarios";
			$tabla3 = "compras";
			$tabla4 = "deseos";

			$id = $_GET["id"];

			if($_GET["foto"] != ""){

				unlink($_GET["foto"]);
				rmdir('vistas/img/usuarios/'.$_GET["id"]);

			}

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla1, $id);
			
			ModeloUsuarios::mdlEliminarComentarios($tabla2, $id);

			ModeloUsuarios::mdlEliminarCompras($tabla3, $id);

			ModeloUsuarios::mdlEliminarListaDeseos($tabla4, $id);

			if($respuesta == "ok"){

		    	$url = Ruta::ctrRuta();

		    	echo'<script>

						swal({
							  title: "¡SU CUENTA HA SIDO BORRADA!",
							  text: "¡Debe registrarse nuevamente si desea ingresar!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								   window.location = "'.$url.'salir";
								  } 
						});

					  </script>';

		    }

		}

	}
}
