<?php require 'partials/adminSecurity.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
	
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>

<body class="fondo">	
	<h1>(INSETRAR CANCIÓN)</h1>
	<a href="adminControl.php">ir al Panel de Administracion</a>
	<section class="item">
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró guardar la nueva tarjeta. Verifique la información</p>");
			}
		}
		?>

		<form action="crud/create.php" enctype="multipart/form-data" method="POST">
			<label for="name">Titulo: </label> <br><input type="text" name="title" required><br>
			<label for="lname">Autor: </label> <br><input type="text" name="author" required><br>
			<label for="lname">Ubicacion: </label> <br><input type="text" name="link" required><br><br>
			<input type="submit" value="Insertar">
		</form>
	</section>


</body>
</html>