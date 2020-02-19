<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
  <!-- script appeller pour ajouter un tome -->
    <?php
    session_start();
      if(!isset($_SESSION['id'])){ //verif user admin
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
      }
      else{
        include 'configbdd.php';

        $idUsers =  $_SESSION['id'];
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] != 'y'){
          echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
        }
        else{ //si admin execute le code
          $idSerieToAdd = $_REQUEST['idSerieToAdd'];
          $tomeNb = $_REQUEST['tomeNb'];
          $stockToAdd = $_REQUEST['stock'];
          $tomeExist = $bdd->query("SELECT COUNT(*) FROM tome WHERE serieID = $idSerieToAdd AND tome = $tomeNb")->fetch()[0]; //nb de tome 
          if ($tomeExist > 0){
            echo "<p>Ce tome existe déjà</p>";
          }
          else{
            $bdd->query("INSERT INTO tome SET serieID = '$idSerieToAdd', tome = '$tomeNb', stock = '$stockToAdd'");
          }
        }
      }
    ?>
  </body>
</html>