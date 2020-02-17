<?php
  include "configbdd.php";
  $idTome = $_REQUEST['idTomeToDel'];
  $stockToDel = $_REQUEST['stockToDel'];
  $currentStock = $bdd->query("SELECT stock FROM tome WHERE id =".$idTome)->fetch()[0];
  $newStock = $currentStock - $stockToDel;
  $bdd->query("UPDATE tome SET stock = $newStock WHERE id = $idTome");
?>