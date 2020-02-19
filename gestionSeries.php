<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
<!-- page admin pour gerer les series -->
        <?php
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
                    echo "<h2>séries actuelle</h2>";
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
                        while ( $serie = $series->fetch()){ //on parcourt les series
                            $idSerie = $serie['id'];
                            $nbTome = $bdd->query("SELECT COUNT(*) FROM tome WHERE serieID = $idSerie")->fetch()[0];
                            echo "<tr>";
                            echo "<td>". $serie['name']."</td>" ;
                            echo "<td>". $serie['author']."</td>" ;
                            echo "<td>". $serie['releaseDate']."</td>" ;
                            echo "<td>". $nbTome."</td>" ;
                            echo "<td><a href='pageAdminGestionDelTomes?idSerieDel=$idSerie'>Supprimer</a></td>" ; //lien pour suppr 
                            echo "<td><a href='pageAdminGestionTomes.php?idSerieAdd=$idSerie'>ajouter</a></td>" ;
                            echo "</tr>";
                        }
                        echo"
                        </tbody>
                    </table>";
                    ?>
                    <!-- <a href="addSerieForm.php">Ajouter une série</a> -->
                    <?php
                }
            }
        ?>
    </body>
</html>