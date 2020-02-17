<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php
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
      $idSerieToAdd = $_REQUEST['idSerieToAdd'];
      
    }
  }
?>
</body>
</html>