<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php
//session_start();

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
    ?>
    <h3>Les emprunts en cours</h3>
    <table>
    <thead>
      <td>Emprunteur</td>
      <td>Série </td>
      <td>Tome </td>
      <td>Date d'emprunt </td>
      <td>Date de retour </td>
      <td>Livre retourner</td>
      <td>mail</td>
    </thead>
    <tbody>
    <?php
    include "configbdd.php";
    $locations = $bdd->query("SELECT * FROM locations");
    while ($location = $locations->fetch()){
      $idCustomer = $location['customersID'];
      $customer = $bdd->query("SELECT * FROM users WHERE id = $idCustomer")->fetch();
      if ($location['returnBool'] == 'n'){
        $idLocation = $location['id'];
        $idLocationSerie = $location['serieID'];
        $nameSerie = $bdd->query("SELECT name FROM series WHERE id = $idLocationSerie")->fetch()[0];
        $tome = $location['tome'];
        $borrowingDate = $location['borrowingDate'];
        $returnDate = $location['returnDate'];
        $mailCustomer = $customer['email'];
        $textMail = "Bonjour, %0D%0A vous avez louer le tome $tome de $nameSerie le $borrowingDate, vous étiez sensé le rendre le $returnDate.  %0D%0A Merci de le rapporter en magasin le plus vite possible. %0D%0A Bonne journée, %0D%0A l`équipe Manga++";
        ?>
          <tr>
            <td> <?php
            if (isset($idCustomer)){
            echo $customer['name']." ".$customer['firstname'];
            }
            else{
              echo "compte supprimé";
            }
            ?> </td>
            <td><?php echo $nameSerie?> </td>
            <td><?php echo $tome?> </td>
            <td><?php echo $borrowingDate?> </td>
            <td><?php echo $returnDate?> </td>
            <?php
            echo "<td> <a href='retourLivre.php?idLocation=$idLocation'>livre rendu</a></td>";
            if (date("Y-m-d") > $returnDate){
              echo "<td><a href='mailto:$mailCustomer?subject=Manga++ : retour livre&body=$textMail'>envoyer un mail au loueur</a></td>";
            }
      }
            ?>
          </tr>
        </tbody>
    <?php

    }
    echo "</table>"
    ?>
    <h3>Les emprunts en cours</h3>
    <table>
      <thead>
        <td>Emprunteur</td>
        <td>Série </td>
        <td>Tome </td>
        <td>Date d'emprunt </td>
        <td>Date de retour </td>
      </thead>
      <tbody>
      <?php
      include "configbdd.php";
      $locations = $bdd->query("SELECT * FROM locations");
      while ($location = $locations->fetch()){
        $idCustomer = $location['customersID'];
        $customer = $bdd->query("SELECT * FROM users WHERE id = $idCustomer")->fetch();
        if ($location['returnBool'] == 'y'){
          $idLocationSerie = $location['serieID'];
          $nameSerie = $bdd->query("SELECT name FROM series WHERE id = $idLocationSerie")->fetch()[0];
          $tome = $location['tome'];
          $borrowingDate = $location['borrowingDate'];
          $returnDate = $location['returnDate'];
          ?>
            <tr>
              <td> <?php echo $customer['name']." ".$customer['firstname'] ?> </td>
              <td><?php echo $nameSerie?> </td>
              <td><?php echo $tome?> </td>
              <td><?php echo $borrowingDate?> </td>
              <td><?php echo $returnDate?> </td>
              <?php
        }
              ?>
            </tr>
          </tbody>
    <?php
    }
    echo "</table>";
  }
}
  ?>
</body>
</html>