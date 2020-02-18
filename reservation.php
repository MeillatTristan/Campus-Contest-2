<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reservation</title>
  </head>
  <body>
  <!-- page de reservation des tomes avec appel du header -->
    <?php
      session_start();
      include "header.php";
      include "configbdd.php";

      $idSerie = $_REQUEST['serie'];
      $tome = $_REQUEST['tome'];
      $idCustomers = $_SESSION['id'];
      $borrowingDate = date("Y-m-d");
      $returnDate = date('Y-m-d',strtotime('+2 week',strtotime($borrowingDate)));

      $stock = $bdd->query("SELECT stock from tome WHERE tome = $tome AND serieID = $idSerie")->fetch()[0];
      if ($stock > 0){
        $updateStock = $stock - 1;
        $updateRequest = "UPDATE tome SET stock=$updateStock WHERE serieID = $idSerie AND tome = $tome";
        $bdd->query($updateRequest);

        $bdd->query("INSERT INTO locations (tome, customersID, borrowingDate, returnDate,serieID) VALUES ('$tome', '$idCustomers', '$borrowingDate', '$returnDate', '$idSerie')");
        header("Location:bibliotheque.php");

      }
      else{
        "<p>Désolé, le tome n'est plus disponible</p>";
      }
    ?>


  </body>
</html>