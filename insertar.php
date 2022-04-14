<?php
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
	<title>Insertar</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
		<h1>(INSETRAR CANCIÓN)</h1>
		<h3>Bienvenido <?php print($_SESSION['user']);?></h3>
		<a href="adminControl.php">ir al Panel de Administracion</a>
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