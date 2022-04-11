<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	$db = db::getDBConnection();
	$destino = "";
	if(isset($_FILES['imagen']) && $_FILES['imagen']['name']!=""){
		$origen  = $_FILES['imagen']['tmp_name'];
		$destino = "cards/".$_FILES['imagen']['name'];
		move_uploaded_file($origen, "../".$destino);
	}

	$Respuesta = $db->updateCard($_POST['card'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino);

	if(!$Respuesta){
		header("Location: ../update.php?card=".$_POST['nombre']."&error=1");
	}else {
		header("Location: ../inicio.php");
	}
?>
