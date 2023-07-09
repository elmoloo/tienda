<?php
class conexion{
    public static function conectar (){
        $con = new PDO("mysql:host=localhost;dbname=proyecto;charset=utf8","root","usuario");
        return $con;
    }
}