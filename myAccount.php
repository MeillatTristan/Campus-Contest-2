<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/profil.css">
  <title>Mon compte</title>
</head>
<body>
  <?php
    include "configbdd.php";
    
    if(!isset($_SESSION['id'])){
      echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
    }
    $idUsers =  $_SESSION['id'];
    $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
    if ($admin->fetch()[0] != 'y'){
      $verifAdmin = "id";
  
    }
    else{$verifAdmin = "idMaj";
    }

    echo($verifAdmin);

    if (isset($_SESSION['id'])){
      $idUsers = $_SESSION['id'];
      $locations = $bdd->query("SELECT * FROM locations WHERE customersID = $idUsers");
<<<<<<< HEAD
      echo "<a href='updateInfos.php?idMaj=".$_REQUEST['idMaj']."'>Modifier mes infos</a>";
=======
      echo "<a class='updateinfos' href='updateInfos.php?idMaj=".$_SESSION['id']."'>Modifier mes infos</a>";
      ?>
      <h2>Mes commandes</h2>
      <?php
>>>>>>> dce1f81b86fa4a560e32326d5216139aa5ec32b9
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