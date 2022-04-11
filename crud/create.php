<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	$origen  = $_FILES['imagen']['tmp_name'];
	$destino = "cards/".$_FILES['imagen']['name'];
	move_uploaded_file($origen, "../".$destino);

	$db = db::getDBConnection();
	$Respuesta = $db->createCard($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$destino);
	if(!$Respuesta){
		header("Location: ../create.php?error=1");
	}else {
		header("Location: ../inicio.php");
	}
?>
