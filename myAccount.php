<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mon compte</title>
</head>
<body>
  <h2>Mes commandes</h2>
  <?php
    include "header.php";
    include "configbdd.php";
    if (isset($_SESSION['id'])){
      $idUsers = $_SESSION['id'];
      $locations = $bdd->query("SELECT * FROM locations WHERE customersID = $idUsers");
      while ($location = $locations->fetch()){
        echo $location['borrowingDate'];
      }
    }
  ?>
</body>
</html>