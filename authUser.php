<?php
  include "configbdd.php";
  //script de verification de l'autentification de l'utilisateur;

  $email = $_REQUEST["email"];
  $password = $_REQUEST['password'];

  $req = $bdd->prepare('SELECT id, password FROM users WHERE email = :email');
  $req->execute(array(
    'email' => $email));
  $resultat = $req->fetch(); //on recupère l'id et le mdp lier au mail (peut être vide si mail faux)

  $isPasswordCorrect = password_verify($password, $resultat['password']); //on vérifie si le mdp rentrer est en accord avec celui en bdd

  

  if (!$resultat){ //si le résultat est vide (donc email faux)
    echo 'Mauvais email ou mot de passe !';
  }
  else{
    if ($isPasswordCorrect) { //si le mdp est bon
        session_start();
        $_SESSION['id'] = $resultat['id']; //ouverture d'une super variable session si le password est correct;
        $idUsers =  $_SESSION['id'];
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] != 'y'){ //si user admin, il est rediriger vers la page admin sinon vers profil
          header("Location: profil.php");

        }
        else {
          header("Location: pageAdmin.php");
        }
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
  }
?>