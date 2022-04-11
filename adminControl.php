<?php
session_start();
require_once "./database.php";

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id,name,email,password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    $user = $results;
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Document</title>
    </head>

    <body class="fondo">
        <?php require 'partials/header.php' ?>
        <?php if(empty($user)): ?>
            <h1>Por favor inicie sesion</h1>
            <a href="login.php">Ingresar</a> or
            <a href="signup.php">Registrarse</a>
        <?php endif; ?>
        <?php if(!empty($user)): ?>
            <div  class="item"> 
                <h2>Administracion</h2>
            </div>
        <?php endif; ?>  
        
        
        <section class="admin">
		<form action="action.php" method="get">
		<table border="1" class="tabla_usuarios">
			<thead>
				<tr>
                <th>select</th>
				<th>id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>password</th>
				</tr>
			</thead>
			<tbody>
				<?php
                
					$records = $conn->prepare('SELECT * FROM users LIMIT 10');
                    $records->execute();

                    while ($usuario= $records->fetch(PDO::FETCH_ASSOC)) {
						print("<tr>");
							print("<td><input type='radio' name='user' value='".$usuario['id']."'> </td>");
                            print("<td>".$usuario['id']."</td>");
                            print("<td>".$usuario['name']."</td>");
                            print("<td>".$usuario['email']."</td>");
                            print("<td>".$usuario['password']."</td>");
						print("</tr>");
					}
				?>
			</tbody>
		</table>
        
		<input type="submit" name="borrar" value="Borrar">
		<input type="submit" name="actualizar" value="Actualizar">
		<input type="submit" name="detalles" value="Detalles">
		<input type="submit" name="nuevo" value="Nuevo">
	    </form>
	    </section>

    </body>

</html>