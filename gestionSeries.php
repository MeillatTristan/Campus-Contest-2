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
        $series = $bdd->query("SELECT * FROM series");
        echo "
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de publication</th>
                    <th>Nombre de tomes</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>";
            while ( $serie = $series->fetch()){
                $idSerie = $serie['id'];
                $nbTome = $bdd->query("SELECT COUNT(*) FROM tome WHERE serieID = $idSerie")->fetch()[0];
                echo "<tr>";
                echo "<td>". $serie['name']."</td>" ;
                echo "<br>";
                echo "<td>". $serie['author']."</td>" ;
                echo "<br>";
                echo "<td>". $serie['releaseDate']."</td>" ;
                echo "<br>";
                echo "<td>". $nbTome."</td>" ;
                echo "<br>";
                echo "<td><a href='delTomeForm?idSerieDel=$idSerie'>Supprimer</a></td>" ;
                echo "<td><a href='addTomeForm.php?idSerieAdd=$idSerie'>ajouter</a></td>" ;
                echo "</tr>";
            }
            echo"
            </tbody>
        </table>";
        ?>
        <a href="addSerieForm.php">Ajouter une série</a>
        <?php
    }
}
?>
</body>
</html>