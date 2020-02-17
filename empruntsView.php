<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Les emprunts en cours</h3>
 <table>
    <td>Emprunteur</td>
    <td>Série </td>
    <td>Tome </td>
    <td>Date d'emprunt </td>
    <td>Date de retour </td>
    <?php
    include "configbdd.php";
    $locations = $bdd->query("SELECT * FROM locations");
    while ($location = $locations->fetch()){
      $idCustomer = $location['customersID'];
      $customer = $bdd->query("SELECT * FROM users WHERE id = $idCustomer")->fetch();
      if ($location['returnBool'] == 'n'){
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
            if (date("Y-m-d") > $returnDate){
              echo "<td> le livre doit être ramener ! </td>";
            }
      }
            ?>
          </tr>
  </table>
  <?php
    
  }
  ?>
</body>
</html>