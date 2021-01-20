<?php

class ControladorCarrito{

    /* mostrar tarifas */

    static  public function ctrMostrarTarifas()
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
            

		$respuesta=	ModeloUsuarios::mdlIngresoComentarios($tabla, $datos);
            
		}

		return $respuesta;

    }
    static public function ctrVerificarProducto($datos){

		$tabla = "compras";

		$respuesta = ModeloCarrito::mdlVerificarProducto($tabla, $datos);
	 
	    return $respuesta;

		
	}
}