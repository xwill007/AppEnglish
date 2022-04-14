<?php
session_start();

require_once "./controlador.php";

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
		
        <?php if($_SESSION['admin']):?>
            <div  class="item"> 
                <h2>Administracion</h2>
            </div>

        <section class="admin">

            <form action="action.php" method="get">
                <table border="1" class="tabla_usuarios">
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
                
                <input type="submit" name="borrar" value="Borrar">
                <input type="submit" name="actualizar" value="Actualizar">
                <input type="submit" name="detalles" value="Detalles">
                <input type="submit" name="nuevo" value="Nuevo">
            </form>
	    </section>

        <?php endif; ?> 
        <?php if(!$_SESSION['admin']): header("Location: inicio.php");?>   
        <?php endif; ?> 
    </body>

</html>