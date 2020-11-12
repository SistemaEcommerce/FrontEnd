<?php
class Conexion{

    public function conectar() {
        $ruta= "localhost";
        $name="SistemaTienda";
        $usuario="root";
        $password="";
  
        $link=new  PDO("mysql:host=$ruta;dbname=$name",
                         $usuario,
                         $password,
                         array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                               PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
                            );
        return $link;
        
    }
}