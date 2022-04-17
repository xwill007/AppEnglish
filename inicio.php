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
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
</head>

<body class="fondo-inicio" >
  <?php require 'partials/header.php' ?>

    <div class="container-sm inicio"> 
        <h2 class="inicio">Karaoke Vr</h2>

        <div  class="descripcion"> 
            <p>Aprende palabras y fraces nuevas con nuestros videos en Ingles, sumergete en la realidad virtual y vive una experiencia Diferente.<br><br>
            <strong>Selecciona tu canción y click en reproducir.</strong>
            </p>
        </div>

        <div  class="lista_seleccion"> 
            <form action="reproducir.php" method="get" >
                <table class="tabla_canciones">
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

        <div class="clear"></div>
    </div>

<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>