<ul>
  <?php
    session_start();
    if (!isset($_SESSION['id'])){
      ?>
      <!-- <li><a href="connexion.php">connexion</a></li> -->
      <li><a href="creationDeCompte.php">inscription</a></li>
      <?php
    }
    else{
      ?>
      <li><a href="deconnexion.php">déconnexion</a></li>
      <?php
    }
  ?>
</ul>