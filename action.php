<?php
	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	//CRUD
	//1. Create
	if (isset($_GET['nuevo'])) {
		header("Location: insertar.php");
	}

	//2. Read
	else if (isset($_GET['detalles'])) {
	    print("detalles action: ".$_GET['card']);
		header("Location: crud/read.php?card=".$_GET['card']);
	}

	//3. Update
	else if (isset($_GET['actualizar'])) {
	    print("actualizar action: ".$_GET['card']);
		header("Location: update.php?card=".$_GET['card']);
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