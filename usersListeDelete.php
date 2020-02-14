<?php
session_start();
//if(isset($_SESSION['id'])){

    include 'configbdd.php';

    $idUser = $_SESSION['id'];
    $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUser")->fetch()[0];

    if ($admin == 'y'){
        require "config.php";

        if(isset ($_GET['id'])){
            q( "DELETE FROM users WHERE id = ".$_GET['id'] );
        }

        $requete = q('SELECT * FROM users');

    ?>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Numéro</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (qFetch($requete) as $users){
                    echo "<tr>";
                    echo "<td>". $users['name']."</td>" ;
                    echo "<br>";
                    echo "<td>". $users['firstname']."</td>" ;
                    echo "<br>";
                    echo "<td>". $users['email']."</td>" ;
                    echo "<br>";
                    echo "<td>". $users['number']."</td>" ;
                    echo "<br>";
                    echo "<td>". $users['admin']."</td>" ;
                    echo "<br>";
                    echo "<td><a href='usersListeDelete.php?id=".$users['id']."'>Supprimer</a></td>" ;
                    echo "<td></td>" ;
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    else{
        header("Location: index.php");
    }
// }
// else{
//     header("Location: index.php");
// }
?>