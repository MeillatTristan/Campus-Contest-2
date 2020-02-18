<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <!-- section pour ajouter une serie si vous etes administrateur -->
    <?php
      session_start();
      if(!isset($_SESSION['id'])){
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
      }
      else{
        include 'configbdd.php'; //Inclusion de la base de donnée

        $idUsers =  $_SESSION['id']; //recup de l'ID du users connecté
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] != 'y'){ //on vérifie si l'utilisateur est un admin
          echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
        }
        else{
          $nameSerie = $_REQUEST['name']; // récupération des données du formulaire de addSerieForm.php
          $auteurSerie = $_REQUEST['auteur'];
          $releaseDate = $_REQUEST['releaseDate'];
          echo $releaseDate."  ".$auteurSerie."  ".$nameSerie;
          $tomeExist = $bdd->query("SELECT COUNT(*) FROM series WHERE name = '$nameSerie' AND author = '$auteurSerie'")->fetch()[0]; //nb de tome avec ces infos
          if ($tomeExist > 0){ //si sup à zero, donc tome existe
            echo "<p>Cette série est déjà dans la base de donnée</p>";
          }
          else{ //si il existe pas on ajoute à la base de données
            $bdd->query("INSERT INTO series SET name = '$nameSerie', author = '$auteurSerie', releaseDate = '$releaseDate'");
          }
        }
      }
    ?>
  </body>
</html>