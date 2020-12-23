<?php

class ControladorUsuarios{

    public function ctrRegistroUsuario() {

        if (isset($_POST["regUsuario"])) {
			
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', 
			   $_POST["regEmail"]) &&
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
				$url=Ruta::ctrRuta();
				$servidor = Ruta::ctrRutaServidor();
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
															  text: "¡Ocurrio un error al verificar el correo electronico: '.$_POST["regEmail"].$mail->ErrorInfo.'!",
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
														  title: "¡ok!",
														  text: "Por favor revise la vandeja de entrada o la carpeta de SPAM de su correo electronico '.$_POST["regEmail"].'  para confirmar la cuenta!",
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
							  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
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

	}
}