<?php

require_once "conexion.php";
class ModeloProductos{

    static function mdlMostrarCategorias($tabla){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    static function mdlMostrarSubCategorias($tabla,$id){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria=:id_categoria");

        $stmt->bindParam("id_categoria",$id,PDO::PARAM_INT);
       
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
}
