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

<body>
    <?php require 'partials/header.php' ?>
    <?php if(empty($user)): ?>
        <h1>Por favor inicie sesion</h1>
        <a href="login.php">Ingresar</a> or
        <a href="signup.php">Registrarse</a>
    <?php endif; ?>

  <i-frame src="/vr360.php" width="500" heigth="500"> 

</body>
</html>