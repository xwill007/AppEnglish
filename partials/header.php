
<header>
  <a class="left" href="index.php">Inicio.</a>

  <?php 
 
  if(isset($_SESSION['auth'])):?>
    <a class="rigth" href="logout.php">Logout</a>
    <strong class="welcome">Welcome <?php print($_SESSION['name'])?> </strong>
  <?php endif; ?> 


</header>
