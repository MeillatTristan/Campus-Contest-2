<?php
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
?>