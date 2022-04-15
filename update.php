<?php require 'partials/adminSecurity.php' ?>
<?php require_once "./controlador.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gra-01">
	<header>
		<h1>Actualizar (UPDATE)</h1>
		<a href="adminControl.php">ir al panel de administracion</a>

	</header>
	<section class="item">
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró actualizar la Cancion. Verifique la información</p>");
			}
		}
		?>

		<form action="crud/update.php" enctype="multipart/form-data" method="POST" class="update">
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