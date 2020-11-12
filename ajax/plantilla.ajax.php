<?php

require_once "../controladores/plantilla.controlador.php";
require_once "../modelos/plantilla.modelo.php";
class AjaxPLantilla{
    public function ajaxEstiloPlantilla(){

        $respuesta=ControladorPlantilla::ctrEstiloPlantilla();

        echo json_encode($respuesta);
    }
}
$objeto=new AjaxPLantilla();
$objeto->ajaxEstiloPlantilla();