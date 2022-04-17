
<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}

	$db = db::getDBConnection();

	if (isset($_GET['song'])) {
		$Respuesta = $db->deleteSong($_GET['song']);
	}
	
	header("Location: ../adminControl.php");

?>
