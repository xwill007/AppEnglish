<?php require 'partials/adminSecurity.php' ?>
<?php require_once "./controlador.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Consola Admin</title>
    </head>

    <body class="fondo">
        <?php require 'partials/header.php' ?>
		
            <div  class="item"> 
                <h2>Administracion</h2>
            </div>

        <section class="admin">

            <form action="action.php" method="get">
                <table class="tabla_usuarios" border="1">
                    <thead>
                        <tr>
                        <th>select</th>
                        <th>id</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $db = db::getDBConnection();
                            $Respuesta = $db->getSongs();
                            while ($Song= $Respuesta->fetch_assoc()) {
                                print("<tr>");
                                    print("<td><input type='radio' name='song' value='".$Song['id']."'></td>");
                                    print("<td>".$Song['id']."</td>");
                                    print("<td>".$Song['title']."</td>");
                                    print("<td>".$Song['author']."</td>");
                                    print("<td>".$Song['link']."</td>");
                                print("</tr>");
                            }   
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="nuevo" value="Nuevo">
                <input type="submit" name="detalles" value="Detalles">
                <input type="submit" name="actualizar" value="Actualizar">
                <input type="submit" name="borrar" value="Borrar">
                
                
            </form>
	    </section>

        
    </body>

</html>