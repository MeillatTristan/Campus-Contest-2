<ul class="navBar">
<!-- script appellé sur les pages pour apporter les fonctionnalitées de navigation et de déconnexion -->
  <?php
    include "configbdd.php";
    if(!isset($_SESSION['id'])){
      ?>
        <li><a href="creationDeCompte.php">Inscription</a></li>
        <li><a href="index.php">connexion</a></li>
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
        <li><a href="bibliotheque.php">Bibliothèque</a></li>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="profil.php">Mon compte</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
      <?php
    }
  ?>
</ul>