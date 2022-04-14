<?php require '../partials/adminSecurity.php' ?>
<?php require_once "../controlador.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Detalle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="fondo">

	<h1>(DETALLES)</h1>	
	<a href="../adminControl.php">ir al Panel de Administracion</a>
	<section class="item">

		<table class="tabla_usuarios"  border="1">
			<thead>
				<tr>
				<th>Id</th>
				<th>Titulo</th>
				<th>Autor</th>
				<th>Link</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = db::getDBConnection();
					$Respuesta = $db->getSong($_GET['song']);
					while ($Song = $Respuesta->fetch_assoc()) {
						print("<tr>");
							print("<td>".$Song['id']."</td>");
							print("<td>".$Song['title']."</td>");
							print("<td>".$Song['author']."</td>");
							print("<td>".$Song['link']."</td>");
						print("</tr>");
					}
				?>
			</tbody>
		</table>
	</section>


</body>
</html>