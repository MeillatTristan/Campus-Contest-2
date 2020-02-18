<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Location</title>
</head>
<body>
  <?php
  session_start();
    include "header.php";
    if (isset($_SESSION['id'])){
      include 'configbdd.php';

      $series = $bdd->query('SELECT * FROM series');
      echo"<div class ='conteneurSerie'>";
      while($serie = $series->fetch())
      {
        $idSerie = $serie['id'];
        $countTome = $bdd->query("SELECT COUNT(id) FROM tome WHERE serieID = $idSerie");
        $nbTome = $countTome->fetch()[0]; //nb de tome
        echo "<div class='tailleChamps'>";
          echo "<h3>".$serie['name']."</h3>";
          echo "
          <form method='get' action='reservation.php'>
          <input type='hidden' name='serie' value= '$idSerie'> </input>
          <select name='tome'>";
          $i = 1 ;
          while ($i <= $nbTome)
          {
            $tomeStock = $bdd->query("SELECT stock from tome WHERE tome = $i AND serieID = $idSerie");
            if ($tomeStock->fetch()[0] > 0){
              echo "<option value='$i'>". $i ."</option>";
              $i++;
            }
            else{
              echo "<option value='indisponible' disabled='disabled'>". $i ." (indisponible)</option>";
              $i++;
            }
          }
          echo "
          </select>
          <br><br>
          <input type='submit' value='louer'>
        </form>";
        echo "</div>";
      }
      echo"</div>";
    }
    else{
      echo "<p> Vous devez être connecté pour avoir accès à cette page !</p>";
    }
  ?>
</body>
</html>