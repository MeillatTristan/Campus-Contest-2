<?php
  //script pour le retour des livres en boolean. retour sur la page gestion des emprunts
  session_start();
  if(!isset($_SESSION['id'])){
      echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
  }
  else{
    include 'configbdd.php';

    $idUsers =  $_SESSION['id'];
    $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
    if ($admin->fetch()[0] != 'y'){
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";

    }
    else{
      $idLocation = $_REQUEST['idLocation'];
      $idSerie = $bdd->query("SELECT serieID FROM locations WHERE id = $idLocation")->fetch()[0];
      $tomeNb = $bdd->query("SELECT tome FROM locations WHERE id = $idLocation")->fetch()[0];
      $stock = $bdd->query("SELECT stock FROM tome WHERE serieID = $idSerie AND tome = $tomeNb")->fetch()[0];
      $stockUpdate = $stock + 1;
      $bdd->query("UPDATE tome SET stock = $stockUpdate WHERE serieID = $idSerie AND tome = $tomeNb");
      $bdd->query("UPDATE locations SET returnBool = 'y' WHERE id = $idLocation");
      header("Location:pageAdminGestionEmprunts.php");
    }
  }
?>