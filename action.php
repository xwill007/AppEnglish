<?php
	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	//1. Create
	if (isset($_GET['nuevo'])) {
		header("Location: insertar.php");
	}

	//2. Read
	else if (isset($_GET['detalles'])) {
		header("Location: crud/read.php?song=".$_GET['song']);
	}

	//3. Update
	else if (isset($_GET['actualizar'])) {
		header("Location: update.php?song=".$_GET['song']);
	}

	// 4. Delete
	else if (isset($_GET['borrar'])) {
		header("Location: crud/delete.php?song=".$_GET['song']);
	}

	else {
		header("Location: inicio.php");
	}
?>

</html>