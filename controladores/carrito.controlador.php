<?php

class ControladorCarrito{

    /* mostrar tarifas */

    public function ctrMostrarTarifas()
    {
        $tabla="comercio";
        $respuesta=ModeloCarrito::mdlMostrarTarifas($tabla);
        return $respuesta;
    }
    
    static public function ctrNuevasCompras($datos){

		$tabla = "compras";

		$respuesta = ModeloCarrito::mdlNuevasCompras($tabla, $datos);

		if($respuesta == "ok"){

			$tabla = "comentarios";
			ModeloUsuarios::mdlIngresoComentarios($tabla, $datos);

		}

		return $respuesta;

	}
}