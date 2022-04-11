<?php
require_once "./controlador.php";

$db = db::getDBConnection();
$Respuesta = $db->getUser($_POST['user'],$_POST['pass']);

if (mysqli_num_rows($Respuesta)>0){
	print("ok<br>");
	session_start();
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['auth'] = true;
	header("Location: inicio.php");
}else{
	print("Error<br>");
	header("Location: index.php?error=1");
}
$db->close();

?>


