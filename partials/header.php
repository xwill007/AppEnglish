
<header>
  <a class="left" href="index.php">Inicio.</a>

  <?php 
  
  if(isset($_SESSION['auth'])):?>
    <a class="rigth" href="logout.php">Logout</a>
  <?php endif; ?> 

  <?php if(!empty($message)): ?>
      <p class="mensaje"> <br> <?= $message ?></p>
  <?php endif; ?>

</header>
