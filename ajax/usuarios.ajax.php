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
}
/* validar email existentte */

if (isset($_POST["validarEmail"])) {

    $valEmail=new AjaxUsuarios();
    $valEmail->validarEmail=$_POST["validarEmail"];
    $valEmail->ajaxValidarEmail();
}