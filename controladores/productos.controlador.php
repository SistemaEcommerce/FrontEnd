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
    static public function ctrMostrarProductos($ordenar,$item,$valor)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlMostrarProductos($tabla,$ordenar,$item,$valor);
        return $respuesta;  
    }
    
    static public function ctrMostrarInfoProducto($item,$valor)
    {
        $tabla="productos";
        $respuesta=ModeloProductos::mdlMostrarInfoProducto($tabla,$item,$valor);
        return $respuesta;  
    }
}