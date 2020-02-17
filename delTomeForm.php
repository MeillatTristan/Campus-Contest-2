<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Supprimer un tome</title>
</head>
<body>
<?php
session_start();

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
    $idSerieToDel = $_REQUEST['idSerieDel'];
    $serie = $bdd->query("SELECT * FROM series WHERE id = $idSerieToDel")->fetch();
    $tomes = $bdd->query("SELECT * FROM tome WHERE serieID = ".$serie['id']);
    $nbTome = $bdd->query("SELECT COUNT(*) FROM tome WHERE serieID = $idSerieToDel")->fetch()[0];
    echo "<h2> Supprimer un tome de la serie ".$serie['name']."</h2>
    <table>
      <thead>
          <tr>
              <th>tome numéro </th>
              <th>stock à supprimer</th>
              <th>supprimer</th>
              <th>supprimer le tome</th>
          </tr>
      </thead>
      <tbody>";
      while ( $tome = $tomes->fetch()){
          echo "<tr>";
          echo "<td>". $tome['tome']."</td>" ;
          echo "<td>";
          echo "<form method='get' action='delTome.php'>";
          echo "<input type='hidden' name='idTomeToDelStock' value= '".$tome['id']."'> </input>";
          echo "<select name='stockToDel'>";
          $i = 0 ;
          while ($i <= $tome['stock']){
            echo "<option value='$i'>". $i ."</option>";
            $i++;
          }
          echo "</select>";
          echo "<td> <input type='submit' value='supprimer'> </td>";
          echo "</form>";
          ?>
          <td> <a href='delTome.php?idTomeToDel= <?php echo $tome['id'] ?>' > supprimer le tome </a> </td>
          <?php
      }
    echo"
    </tbody>
</table>";
  }

}

?>
</body>
</html>