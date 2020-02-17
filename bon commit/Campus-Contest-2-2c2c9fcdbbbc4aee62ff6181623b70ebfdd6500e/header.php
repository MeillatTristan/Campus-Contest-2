<ul>
  <?php
    if(!isset($_SESSION['id'])){
      ?>
        <li><a href="creationDeCompte.php">Inscription</a></li>
      <?php
    }
    else{
      ?>
      <li><a href="deconnexion.php">Déconnexion</a></li>
      <?php
    }
  ?>
</ul>