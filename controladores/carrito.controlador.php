<?php

class ControladorCarrito{

    /* mostrar tarifas */

    public function ctrMostrarTarifas()
    {
        $tabla="comercio";
        $respuesta=ModeloCarrito::mdlMostrarTarifas($tabla);
        return $respuesta;
    }
}