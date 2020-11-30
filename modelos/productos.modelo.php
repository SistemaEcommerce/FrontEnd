<?php

require_once "conexion.php";
class ModeloProductos{

    static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

    static function mdlMostrarSubCategorias($tabla,$item,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

        $stmt->bindParam(":".$item,$valor,PDO::PARAM_INT);
       
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static function mdlMostrarProductos($tabla,$ordenar,$item,$valor){

        if($item !=null){

            $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item ORDER BY $ordenar DESC LIMIT 8");
            $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);


            $stmt->execute();
            return $stmt->fetchAll();
        }else {
            
            $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC LIMIT 8");
            
            $stmt->execute();
            return $stmt->fetchAll();

        }
        $stmt->close();
        $stmt=null;
    }
    static function mdlMostrarInfoProducto($tabla,$item,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

        $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
       
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt=null;
    }
    
}
