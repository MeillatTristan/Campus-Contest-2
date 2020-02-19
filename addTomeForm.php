<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un tome</title>
  </head>
  <body>
  <!-- Formulaire appellé pour ajouter un nouveau tome a une série -->
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
            $idSerieToAdd = $_REQUEST['idSerieAdd'];
            $nameSerie = $bdd->query("SELECT name FROM series WHERE id = $idSerieToAdd")->fetch()[0];
            echo "<h2>ajouter un tome à la série $nameSerie</h2>";
            ?>
          <form action="addTome.php" method="post">

            <input type='hidden' name='idSerieToAdd' value= "<?php echo $idSerieToAdd ?>" > </input>

            <label for="tomeNb">Tome numéro</label>
            <input type="text" id="tomeNb" name="tomeNb" minlength="1" required>

            <label for="stock"> Stock :</label>
            <input type="text" id="stock" name="stock"minlength="1" required>

            <input type="submit" value="Valider">
          </form>
        <?php
        }
      }
    ?>
  </body>
</html>