<?php


class ControladorPlantilla{

	public function plantilla(){

		include "vistas/plantilla.php";

	}
	public function ctrEstiloPlantilla() {
		
		$tabla="plantilla";

		$respuesta= ModeloPlantilla::mdlEstiloPlantilla($tabla);
		
		return $respuesta;
	}

	static public function ctrTraerCabeceras($ruta){

		$tabla = "cabeceras";

		$respuesta = ModeloPlantilla::mdlTraerCabeceras($tabla, $ruta);

		return $respuesta;	

	}
}
