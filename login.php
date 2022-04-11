<?php
  /*
  require_once "./database.php";
  $enlace = conexionDB();

  $consulta = "SELECT * FROM users WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
  $Respuesta = $enlace->query($consulta);

  if($Respuesta){
    if(mysqli_num_rows($Respuesta)>0){
      print("ok <br>");
      session_start();
      $_SESSION['user'] = $_POST['email'];
      $_SESSION['auth'] = true;
      header("location: index.php");
    }else{
      print("Error <br>");
      header("location: index.php?error=1");
    }
    $enlace->close();
  }

  */
  session_start();
  $message = '';

  if (isset($_SESSION['user_id'])) {
    header('Location: /AppEnglish/inicio.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $records = $conn->prepare('SELECT email,password,id FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    //if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    if (count($results) > 0 && ($_POST['pass']==$results['password']) ){
      $_SESSION['user_id'] = $results['id'];
      header("Location: /AppEnglish/inicio.php");
      $message = 'ingreso exitoso';
    } else {
      $message = 'Sus datos no coinciden';
    }
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body class="bg-gra-01">
    <?php require 'partials/header.php' ?>

    <h1>Ingresar</h1>
    <a href="signup.php">Registrate</a>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresar email">
      <input name="pass" type="password" placeholder="Ingresar Password">
      <input type="submit" value="Ingresar">
    </form>

  </body>
</html>
