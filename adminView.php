<?php
session_start();

if(!isset($_SESSION['id'])){
    echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";
  }
include 'configbdd.php';

$idUsers =  $_SESSION['id'];
$admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
if ($admin->fetch()[0] != 'y'){
    echo "veuillez vous connectez en tant qu'admin pour accéder à cette page";

}
else{
    if(isset($_REQUEST['idDel'])){
        $idDel = $_REQUEST['idDel'];
        $bdd->query("DELETE FROM users WHERE id = $idDel");
    }

    $requete = $bdd->query('SELECT * FROM users');
    echo "
    <h3>Utilisateurs :</h3>
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
        <tbody>";
        while ( $users = $requete->fetch()){
            $admin = $bdd->query("SELECT admin FROM users WHERE id = ".$users['id'] );
            echo "<tr>";
            echo "<td>". $users['name']."</td>" ;
            echo "<td>". $users['firstname']."</td>" ;
            echo "<td>". $users['email']."</td>" ;
            echo "<td>". $users['number']."</td>" ;
            echo "<td>". $users['admin']."</td>" ;
            echo "<td><a href='usersListeDelete.php?idDel=".$users['id']."'>Supprimer</a></td>" ;
            echo "<td><a href='profil.php?idMaj=".$users['id']."'>Modifier</a></td>" ;
            echo "</tr>";
        }
        echo"
        </tbody>
        </table>";
}
?>