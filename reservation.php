<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>reservation</title>
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
    $idSerie = $_REQUEST['serie'];
    $tome = $_REQUEST['tome'];
    $stock = $bdd->query("SELECT stock from livre WHERE tome = $tome AND serieID = $idSerie")->fetch()[0];
    if ($stock > 0){
    $updateStock = $stock - 1;

    $updateRequest = "UPDATE livre SET stock=$updateStock WHERE serieID = $idSerie AND tome = $tome";
    echo "<p>Le tome à bien été loué</p>";
    $bdd->query($updateRequest);
    }
    else{
      "<p>Désolé, le tome n'est plus dispo</p>";
    }
  ?>


</body>
</html>