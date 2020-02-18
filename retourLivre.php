<?php
  session_start();
  echo "yo";
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
      $bdd->query("UPDATE locations SET returnBool = 'y' WHERE id = $idLocation");
      header("Location:pageAdminGestionEmprunts.php");
    }
  }
?>