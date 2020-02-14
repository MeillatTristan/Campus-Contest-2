<?php

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
            echo "<td>". $users['nom']."</td>" ;
            echo "<br>";
            echo "<td>". $users['prenom']."</td>" ;
            echo "<br>";
            echo "<td>". $users['email']."</td>" ;
            echo "<br>";
            echo "<td>". $users['numero']."</td>" ;
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