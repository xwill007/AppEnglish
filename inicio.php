<?php
	require_once "./controlador.php";
	require "partials/authSecurity.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>App English</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body style="background:url(imagenes/fondo-karaoke.jpg); background-repeat: no-repeat; background-size: cover;" >
  <?php require 'partials/header.php' ?>

    <div  class="item"> 
        <h2>Karaoke Vr</h2>
        <p>Aprende palabras y fraces nuevas con nuestros videos en Ingles y Español, sumergete en la realidad virtual y vive una experiencia Diferente.<br><br>
        <a class="descripcion" href="vr360.php">click para ingresar al mundo vr360.</a>
        </p>
    </div>

    <div  class="item"> 
        <form action="reproducir.php" method="get" id="inicio">
            <table class="tabla_usuarios" border="1">
                <?php
                    $db = db::getDBConnection();
                    $Respuesta = $db->getSongs();
                    
                    while ($Song= $Respuesta->fetch_assoc()) {
                        print("<tr>");
                            print("<td><input type='radio' name='song' value='".$Song['id']."'></td>");
                            print("<td>".$Song['id']."</td>");
                            print("<td>".$Song['title']."</td>");
                            print("<td>".$Song['author']."</td>");
                        print("</tr><br>");
                    }   
                ?>
            </table>
            <input type="submit" name="reproducir" value="Reproducir">
        </form>
    </div>

</body>
</html>