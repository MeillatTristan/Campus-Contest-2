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
    if (isset($_SESSION['id'])){
      include "configbdd.php";
      $series = $bdd->query('SELECT * FROM series');
      echo"<div class ='conteneurSerie'>";
      while ($serie = $series->fetch())
      {
        $idSerie = $serie['id'];
        echo "<div class='tailleChamps'>";
        echo "<h4>".$serie['name']."</h4>";
        $imgSerie = $serie['picture'];
        if ( $imgSerie == 'none'){
          echo "<img src='assets/image/noImage.jpg'>";
        }
        else{
          echo "<img src='https://media.senscritique.com/media/000015702798/source_big/One_Piece.jpg'>";
        }
        $tomes = $bdd->query("SELECT * from tome WHERE serieID = $idSerie");
        ?>
        <form method='post' action='reservation.php'>
          <?php echo "<input type='hidden' name='serie' value= '$idSerie'>" ?>
          <select name='tome'>
            <?php
            while ($tome = $tomes->fetch()){
              if ($tome['stock'] > 0){
                echo "<option value='".$tome['tome']."'>". $tome['tome'] ."  (".$tome['stock'].")</option>";
              }
              else{
                echo "<option value='indisponible' disabled='disabled'>". $tome['tome'] ." (indisponible)</option>";
                $i++;
              }
            }
          ?>
          </select>
          <input type='submit' value='louer'>
        </form>
        </div>
        <?php
      }
      echo"</div>";
    }
  ?>
</body>
</html>