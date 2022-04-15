<?php
  require 'controlador.php';
  $message = '';

  if ( !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) ) {

    if ( ($_POST['password']) == ($_POST['confirm_password']) ) {

      //{   verificar que no exista el email en otro usuario
      $db = db::getDBConnection();
      $Respuesta = $db->getName($_POST['email']);

      if (mysqli_num_rows($Respuesta)==0){

        $resultado = $db->createUser($_POST['name'],$_POST['email'],$_POST['password']);

        if ($resultado) {
          $message = 'Nuevo usuario creado';
          header("Location: /AppEnglish/index.php");

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
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  
  </head>
  
  <body class="registro">
    <?php require 'partials/header.php' ?>

    <div class="container-sm">
      <h1>Registrate</h1>
      <a href="login.php">Ingresar</a>

      <form action="signup.php" method="POST" class="form-horizontal">
        <i class="bi bi-person-fill icon-person"></i>
        <input name="name" type="text" placeholder="Nombre: " class="form-control"> 
        <input name="email" type="text" placeholder="Email: ">
        <input name="password" type="password" placeholder="Contraseña: ">
        <input name="confirm_password" type="password" placeholder="Confirma contraseña: ">
        <input type="submit" value="Registrar">
      </form>

      <?php if(!empty($message)): ?>
        <p class="mensaje"> <br> <?= $message ?></p>
      <?php endif; ?>

    </div>

  
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
