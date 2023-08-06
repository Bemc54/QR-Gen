<?php
class Conexion{
  public static function conectar(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qr";

    $con = new mysqli($servername, $username, $password, $database);
    if ($con->connect_error) 
    {
      echo "error";
    }
    else
    {
      return $con;
    }
  }
}
?>