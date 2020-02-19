<?php
//script appellé lors de la suppression d'un tome
  session_start();
  if(!isset($_SESSION['id'])){
      echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
  }
  else{
    include 'configbdd.php';

    //verif admin

    $idUsers =  $_SESSION['id'];
    $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
    if ($admin->fetch()[0] != 'y'){
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";

    }
    else{
      if (isset($_REQUEST['idTomeToDel'])){ //si un tome à suppr à bien été passé en parametre
        $idTome = $_REQUEST['idTomeToDel'];

        $bdd->query("DELETE FROM tome WHERE id = $idTome");
      }
      else{ //sinon on modifie juste la colonne stock avec la nouvelle valeur
      $idTome = $_REQUEST['idTomeToDelStock'];
      $stockToDel = $_REQUEST['stockToDel'];
      $currentStock = $bdd->query("SELECT stock FROM tome WHERE id =".$idTome)->fetch()[0];
      $newStock = $currentStock - $stockToDel;
      $bdd->query("UPDATE tome SET stock = $newStock WHERE id = $idTome");
      }
    }
  }
?>