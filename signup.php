<?php
  require 'database.php';
  $message = '';

  if ( !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) ) {

    if ( ($_POST['password']) == ($_POST['confirm_password']) ) {

      //{   verificar que no exista el email en otro usuario
      $consulta= "SELECT * FROM users WHERE email='".$_POST['email']."'";
      $Respuesta= mysqli_query($conexion,$consulta);
      if (mysqli_num_rows($Respuesta)==0){

        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        //$stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
          $message = 'Nuevo usuario creado';
          header("Location: /AppEnglish/login.php");
        } else {$message = 'Error al crear usuario';}

      }else{$message = 'El email ya existe';}

    }else{$message = 'Las contraseñas no coinciden';}

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  
  <body class="bg-gra-01">
    <?php require 'partials/header.php' ?>

    <h1>Registrate</h1>
    <a href="login.php">Ingresar</a>

    <form action="signup.php" method="POST">
      <input name="name" type="text" placeholder="Nombre: ">
      <input name="email" type="text" placeholder="Email: ">
      <input name="password" type="password" placeholder="Contraseña: ">
      <input name="confirm_password" type="password" placeholder="Confirma contraseña: ">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
