<ul>
  <?php
    include "configbdd.php";
    if(!isset($_SESSION['id'])){
      ?>
        <li><a href="creationDeCompte.php">Inscription</a></li>
      <?php
    }
    else{
      $idUsers =  $_SESSION['id'];
      $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
      if ($admin->fetch()[0] == 'y'){
        ?>
          <li><a href="pageAdmin.php">Page Admin</a></li>
        <?php
      }
      ?>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="deconnexion.php">Déconnexion</a></li>
      <?php
    }
  ?>
</ul>