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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="index"> 
    <div class="container-sm" >
      
      <div class="titulo_principal"> <h1>Aprende ingles de forma divertida en Realidad Virtual</h1> </div>
      <div class="fondo_index" >

        <form action="login.php" method="post">
          
          <input id="email" type="text" name="user" placeholder="Ingresar email" required>
          <input id="password" type="password" name="pass" placeholder="Ingresar Contraseña" required><br>
          <input type="submit" name="enviar" value="Ingresar">

          <div class="error">
            <?php if(isset($_GET['error'])){
            if($_GET['error']==1){
              print("<p class='error'>Verificar datos</p>");
            }else if($_GET['error']=="NoAutenticado"){
              print("<p class='error'>Debe iniciar sesion</p>");
            }else if($_GET['error']=="NOadmin"){
              print("<p class='error'>Debe iniciar sesion de Administrador</p>");
            }
            }?>
          </div>
          
        </form>
        
        <a href="signup.php" >Registrarse</a> 

      </div>

    </div>
  
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  
</html>