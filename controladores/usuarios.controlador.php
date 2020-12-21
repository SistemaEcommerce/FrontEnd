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
				echo '<script> 

						swal({
							  title: "ok!",
							  text: "Por favor revise la vandeja de entrada para confirmar la cuenta!",
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
}