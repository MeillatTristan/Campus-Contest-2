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
    include "configbdd.php";
    if (isset($_SESSION['id'])){
      $idUsers = $_SESSION['id'];
      $locations = $bdd->query("SELECT * FROM locations WHERE customersID = $idUsers");
      echo "<a href='updateInfos.php?idMaj=".$_SESSION['id']."'>Modifier mes infos</a>";
      echo "<h3>Commandes en cours</h3>";
      echo "<table>";
      echo "<td>Série </td>";
      echo "<td>Tome </td>";
      echo "<td>Date d'emprunt </td>";
      echo "<td>Date de retour </td>";
      while ($location = $locations->fetch()){
        $currentDate = date("Y-m-d");
        if ($location['returnBool'] == 'n'){
          $idLocationSerie = $location['serieID'];
          $nameSerie = $bdd->query("SELECT name FROM series WHERE id = $idLocationSerie")->fetch()[0];
          $tome = $location['tome'];
          $borrowingDate = $location['borrowingDate'];
          $returnDate = $location['returnDate'];
          ?>
            <tr>
              <td><?php echo $nameSerie?> </td>
              <td><?php echo $tome?> </td>
              <td><?php echo $borrowingDate?> </td>
              <td><?php echo $returnDate?> </td>
              <?php
              if (date("Y-m-d") > $returnDate){
                echo "<td> Vous devez ramener votre livre !</td>";
              }
              ?>
            </tr>
          </table>
          <?php
        }
      }
      echo "<h3>Commandes terminées</h3>";
      echo "<table>";
      echo "<td>Série </td>";
      echo "<td>Tome </td>";
      echo "<td>Date d'emprunt </td>";
      echo "<td>Date de retour </td>";
      while ($location = $locations->fetch()){
        $currentDate = date("Y-m-d");
        if ($location['returnBool'] != 'n'){
          $idLocationSerie = $location['serieID'];
          $nameSerie = $bdd->query("SELECT name FROM series WHERE id = $idLocationSerie")->fetch()[0];
          $tome = $location['tome'];
          $borrowingDate = $location['borrowingDate'];
          $returnDate = $location['returnDate'];
          ?>
            <tr>
              <td><?php echo $nameSerie?> </td>
              <td><?php echo $tome?> </td>
              <td><?php echo $borrowingDate?> </td>
              <td><?php echo $returnDate?> </td>
            </tr>
          </table>
          <?php
        }
      }
    }
  ?>
</body>
</html>