<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id,name,email,password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    //if (count($results) > 0) {
      $user = $results;
    //}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body style="background:url(imagenes/fondo-karaoke.jpg); background-repeat: no-repeat; background-size: cover;" >
  <?php require 'partials/header.php' ?>

  <?php if(empty($user)): ?>
      <h1>Por favor inicie sesion</h1>
      <a href="login.php">Ingresar</a> or
      <a href="signup.php">Registrarse</a>
  <?php endif; ?>
  <?php if(!empty($user)): ?>
      <div  class="item"> 
          <h2>Karaoke Vr</h2>
          <p>Aprende palabras y fraces nuevas con nuestros videos en Ingles y Español, sumergete en la realidad virtual y vive una experiencia Diferente.<br>
          <a class="descripcion" href="vr360.php">click para ingresar al mundo vr360.</a>
          </p>
      </div>
  <?php endif; ?>

</body>
</html>