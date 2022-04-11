
<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	$db = db::getDBConnection();

	if (isset($_GET['user'])) {
	    print("borrar action: ".$_GET['user']);
		$Respuesta = $db->deleteuser($_GET['user']);
	}
	
	header("Location: ../adminControl.php");

?>
