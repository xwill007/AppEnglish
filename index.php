<?php
  require_once "./controlador.php";

  session_start();
  if(isset($_SESSION['auth'])){
    header("Location: inicio.php");
}
  
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>English App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body class="bg-gra-01">
      <?php require 'partials/header.php' ?>

      <h1>Aprende ingles de forma divertida en Realidad Virtual</h1>

      <div class="fondo_inicio" style="background:url(imagenes/gafas_vr.jpg);  background-position: center; background-repeat: no-repeat; background-size: cover; ">

        <form action="login.php" method="post">
          
          <?php
          if(isset($_GET['error'])){
            if($_GET['error']==1){
              print("<p class='error'>Verificar datos</p>");
            }else if($_GET['error']==2){
              print("<p class='error'>Debe iniciar sesion</p>");
            }
          }
          ?>

          <input id="email" type="text" name="user" placeholder="Ingresar email" required>
          <input id="password" type="password" name="pass" placeholder="Ingresar Contraseña" required><br>
          <input type="submit" name="enviar" value="Ingresar">
        </form>
        
      <a href="signup.php" class="intro">Registrarse</a> 

      </div>

  </body>
  
</html>