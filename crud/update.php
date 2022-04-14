<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	$db = db::getDBConnection();
	$Respuesta = $db->updateSong($_POST['song'],$_POST['id'],$_POST['titulo'],$_POST['autor'],$_POST['link']);

	if(!$Respuesta){
		header("Location: ../update.php?song=".$_POST['song']."&error=1");
	}else {
		header("Location: ../adminControl.php");
	}
?>
