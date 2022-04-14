<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	

	$db = db::getDBConnection();
	$Respuesta = $db->createSong($_POST['title'], $_POST['author'], $_POST['link']);

	if(!$Respuesta){
		header("Location: ../insertar.php?error=1");
	}else {
		header("Location: ../adminControl.php");
	}
?>
