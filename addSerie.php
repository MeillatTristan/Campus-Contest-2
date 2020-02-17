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
      $nameSerie = $_REQUEST['name'];
      $auteurSerie = $_REQUEST['auteur'];
      $releaseDate = $_REQUEST['releaseDate'];
      echo $releaseDate."  ".$auteurSerie."  ".$nameSerie;
      $tomeExist = $bdd->query("SELECT COUNT(*) FROM series WHERE name = '$nameSerie' AND author = '$auteurSerie'")->fetch()[0];
      if ($tomeExist > 0){
        echo "<p>Cette série est déjà dans la base de donnée</p>";
      }
      else{
        $bdd->query("INSERT INTO series SET name = '$nameSerie', author = '$auteurSerie', releaseDate = '$releaseDate'");
      }
    }
  }
?>
</body>
</html>