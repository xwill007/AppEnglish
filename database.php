<?php

/*
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","db_app_english");

function conexionDB(){
  $enlace = new mysqli(HOST,USER,PASS,DB);
  if($enlace->connect_error){
    $error = "Error en la conexion:".$enlace->error." mensaje:".$enlace->connect_error;
    die($error);
  }
  $consulta = "SET CHARACTER SET UTF8";
  $enlace->query($consulta);
  return $enlace;
}
*/
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'db_app_english';
$conexion = mysqli_connect($server,$username,$password) or die ('Connection Fallida: ' . $e->getMessage());
mysqli_select_db($conexion,$database);

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' .$e->getMessage());
}

?>
