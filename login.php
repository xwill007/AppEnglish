<?php
require_once "./controlador.php";

$db = db::getDBConnection();
$Respuesta = $db->getUser($_POST['user'],$_POST['pass']);


if (mysqli_num_rows($Respuesta)>0){
	session_start();
	$_SESSION['user'] = $_POST['user'];
	$Result = $db->getName($_POST['user']);
	$nombre = $Result->fetch_array()[0]??'';
	$_SESSION['name'] = $nombre; 
	$_SESSION['auth'] = true;
	if($_SESSION['user'] == "admin@admin.com"){
		$_SESSION['admin'] = true;
		header("Location: adminControl.php");	
	}else{
		$_SESSION['admin'] = false;
		header("Location: inicio.php");
	}
}else{
	print("Error<br>");
	header("Location: index.php?error=1");
}
$db->close();

?>


