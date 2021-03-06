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
  <!-- script appellé qui permet de voir quels tomes sont loué ou reservé et la date de retour de ceux ci -->
    <?php
      include "configbdd.php";

      if(!isset($_SESSION['id'])){
        echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
      }
      else{
        $idUsers = $_SESSION['id'];
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] == 'y' && isset($_REQUEST['idMaj'])){
          $idToMaj = $_REQUEST['idMaj'];
        }
        else{
          $idToMaj = $idUsers;
        }
        $idUsers = $_SESSION['id'];
        $locations = $bdd->query("SELECT * FROM locations WHERE customersID = $idToMaj");
        echo "<a class='updateinfos' href='updateInfos.php?idMaj=".$idToMaj."'>Modifier mes infos</a>";
    ?>
    <h2>Mes commandes</h2>
    <?php
      echo "<h3>Commandes en cours</h3>";
      echo "<thead>";
      echo "<table>";
      echo "<td>Série </td>";
      echo "<td>Tome </td>";
      echo "<td>Date d'emprunt </td>";
      echo "<td>Date de retour </td>";
      echo "</thead>";
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
    <?php
      }
    }
      $locationss = $bdd->query("SELECT * FROM locations WHERE customersID = $idToMaj");
      echo "</table>";
      echo "<thead>";
      echo "<h3>Commandes terminées</h3>";
      echo "<table>";
      echo "<td>Série </td>";
      echo "<td>Tome </td>";
      echo "<td>Date d'emprunt </td>";
      echo "<td>Date de retour </td>";
      echo "</thead>";
      while ($location = $locationss->fetch()){
        $currentDate = date("Y-m-d");
        if ($location['returnBool'] == 'y'){
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
    <?php
        }
      }
    echo "</table>";
    }
    ?>
  </body>
</html>