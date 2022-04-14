<?php
	require_once "./controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Actualizar</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
		<h1>Actualizar (UPDATE)</h1>
		<h3>Bienvenido <?php print($_SESSION['user']);?></h3>

		<a href="adminControl.php">ir al panel de administracion</a>

		<nav>
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró actualizar la Cancion. Verifique la información</p>");
			}
		}
		?>

		<form action="crud/update.php" enctype="multipart/form-data" method="POST">
			<?php
				$db = db::getDBConnection();
				$Respuesta = $db->getSong($_GET['song']);
				while ($Song = $Respuesta->fetch_assoc()) {
			?>
			<label for="name">Cancion:</label><br>	<input type="text" name="song" 		value="<?php print($Song['id'])?>" required hidden><br>
			<label for="name">Id:</label><br> 		<input type="text" name="id" 		value="<?php print($Song['id'])?>" required><br>
			<label for="name">Titulo:</label><br> 	<input type="text" name="titulo" 	value="<?php print($Song['title'])?>" required><br>
			<label for="lname">Autor:</label><br> 	<input type="text" name="autor" 	value="<?php print($Song['author'])?>" required><br>
			<label for="lname">link:</label><br> 	<input type="text" name="link" 		value="<?php print($Song['link'])?>" required><br><br>
			
				<?php }?>
			<input type="submit" value="Actualizar">

		</form>
	</section>


</body>
</html>