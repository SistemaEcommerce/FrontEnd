<?php

class ControladorProductos{
    
    static public function ctrMostrarCategorias($item,$valor){
        $tabla="categorias";
        $respuesta=ModeloProductos::mdlMostrarCategorias($tabla,$item,$valor);
        return $respuesta;
    }
    static public function ctrMostrarSubCategorias($item,$valor){
        $tabla="subcategorias";
        $respuesta=ModeloProductos::mdlMostrarSubCategorias($tabla,$item,$valor);
        return $respuesta;
    }
    static public function ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlMostrarProductos($tabla,$ordenar,$item,$valor,$base,$tope,$modo);
        return $respuesta;  
    }
    
    static public function ctrMostrarInfoProducto($item,$valor)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlMostrarInfoProducto($tabla,$item,$valor);
        return $respuesta;  
    }
    static public function ctrListarProductos($ordenar,$item,$valor)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlListarProductos($tabla,$ordenar,$item,$valor);
        return $respuesta;  
    }
    static public function ctrMostrarBanner($ruta)
    {
        $tabla="banner";
        $respuesta=ModeloProductos::mdlMostrarBanner($tabla,$ruta);
        return $respuesta;   
    }
    
    static public function ctrBuscarProductos($busqueda,$ordenar,$modo,$base,$tope)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlBuscarProductos($tabla,$busqueda,$ordenar,$modo,$base,$tope);
        return $respuesta;   
    }
    static public function ctrListarProductosBusqueda($busqueda)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlListarProductosBusqueda($tabla,$busqueda);
        return $respuesta;   
    }
    static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}
    
}