<?php
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
    include "configbdd.php";
    if (isset($_REQUEST['idTomeToDel'])){
      $idTome = $_REQUEST['idTomeToDel'];

      $bdd->query("DELETE FROM tome WHERE id = $idTome");
    }
    else{
    $idTome = $_REQUEST['idTomeToDelStock'];
    $stockToDel = $_REQUEST['stockToDel'];
    $currentStock = $bdd->query("SELECT stock FROM tome WHERE id =".$idTome)->fetch()[0];
    $newStock = $currentStock - $stockToDel;
    $bdd->query("UPDATE tome SET stock = $newStock WHERE id = $idTome");
    }
  }
}
?>