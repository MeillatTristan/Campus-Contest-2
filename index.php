<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Accueil</title>
</head>
<body>
<?php include 'header.php' ?>
<?php
  $borrowingDate = date("d-m-Y");
  $returnDate = date('d-m-Y',strtotime('+2 week',strtotime($borrowingDate)));

  echo "$borrowingDate \n $returnDate";
?>
</body>
</html>