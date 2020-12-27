<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
class AjaxUsuarios{
    /* validar email */
	public $validarEmail;

	public function ajaxValidarEmail(){

		$datos = $this->validarEmail;

		$respuesta = ControladorUsuarios::ctrMostrarUsuario("email", $datos);

		echo json_encode($respuesta);

	}

/* ingreso con facebook */
	public $email;
	public $nombre;
	public $foto;

	public function ajaxRegistroFacebook(){

		$datos = array("nombre"=>$this->nombre,
					   "email"=>$this->email,
					   "foto"=>$this->foto,
					   "password"=>"null",
					   "modo"=>"facebook",
					   "verificacion"=>0,
					   "emailEncriptado"=>"null",
					   "passwordNormal"=>"null");

		$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

		/* echo $respuesta; */	

	}
	
}
/* validar email existentte */

if (isset($_POST["validarEmail"])) {

    $valEmail=new AjaxUsuarios();
    $valEmail->validarEmail=$_POST["validarEmail"];
    $valEmail->ajaxValidarEmail();
}
/* registro con facebook */

if(isset($_POST["email"])){

	$regFacebook = new AjaxUsuarios();
	$regFacebook -> email = $_POST["email"];
	$regFacebook -> nombre = $_POST["nombre"];
	$regFacebook -> foto = $_POST["foto"];
	$regFacebook -> ajaxRegistroFacebook();

}