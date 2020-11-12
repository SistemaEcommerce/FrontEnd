<?php

class ControladorProductos{
    
    public function ctrMostrarCategorias(){
        $tabla="categorias";
        $respuesta=ModeloProductos::mdlMostrarCategorias($tabla);
        return $respuesta;
    }
    static public function ctrMostrarSubCategorias($id){
        $tabla="subcategorias";
        $respuesta=ModeloProductos::mdlMostrarSubCategorias($tabla,$id);
        return $respuesta;
    }
    
}