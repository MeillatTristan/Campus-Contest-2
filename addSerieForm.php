<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
  <!-- Formulaire appeller pour ajouter une nouvelle série -->
    <?php
      if(!isset($_SESSION['id'])){ //si pas connecté ou pas admin
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
      }
      else{
        include 'configbdd.php';

        $idUsers =  $_SESSION['id'];
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] != 'y'){
          echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
        }
        else{ //sinon on execute le code de la page
          echo "<h2>ajouter une nouvelle série</h2>";
          ?>
          <!-- formulaire d'ajout d'une série -->
          <form action="addSerie.php" method="post" enctype="multipart/form-data">

            <label for="name">Titre :</label>
            <input type="text" id="name" name="name" minlength="2" required>

            <label for="auteur"> Auteur :</label>
            <input type="text" id="auteur" name="auteur" minlength="2" required>

            <label for="ReleaseDate"> Date de parution :</label>
            <input type="date" id="ReleaseDate" name="releaseDate" required>

            <label for="picture"> Couverture De la Série :</label>
            <input type="file" id="pictureSerie" name="pictureSerie" required>

            <input type="submit" value="Valider">
          </form>
          <?php
          }
        }
    ?>
  </body>
</html>