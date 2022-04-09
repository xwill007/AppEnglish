<header>
  <a class="left" href="index.php">Inicio.</a>

  <?php if(!empty($user)): ?>
    <strong class="welcome"> Welcome <?= $user['name']; ?> </strong>
    <a class="rigth" href="logout.php">Logout</a>
  <?php endif; ?> 

  <?php if(!empty($message)): ?>
      <p class="mensaje"> <br> <?= $message ?></p>
  <?php endif; ?>

</header>
