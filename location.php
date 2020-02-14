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
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=manga++;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $series = $bdd->query('SELECT * FROM series');
    while($serie = $series->fetch())
    {
      $idSerie = $serie['id'];
      $countTome = $bdd->query("SELECT COUNT(id) FROM livre WHERE serieID = $idSerie");
      $nbTome = $countTome->fetch()[0]; //nb de tome
      echo "<h3>".$serie['name']."</h3>";
      echo "
      <form action='reservation.php'>
      <select name='tome' size='".$nbTome."' multiple>";
      // for ($i = 1; $i <= $nbTome; $i++) {
      //   echo "<option value='tome'>". $i ."</option>";
      // }
      $i = 1 ;
      while ($i <= $nbTome)
      {
        echo "<option value='tome'>". $i ."</option>";
        $i++;
      }
      echo "
      </select>
      <br><br>
      <input type='submit' value='louer'>
    </form>";
    }
  ?>
</body>
</html>