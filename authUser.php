<?php
  include "configbdd.php";
  //script de verification de l'autentification de l'utilisateur;

  $email = $_REQUEST["email"];
  $password = $_REQUEST['password'];

  $req = $bdd->prepare('SELECT id, password FROM users WHERE email = :email');
  $req->execute(array(
    'email' => $email));
  $resultat = $req->fetch();

  $isPasswordCorrect = password_verify($password, $resultat['password']);

  //ouverture d'une super variable session si le password est correct;

  if (!$resultat){
    echo 'Mauvais email ou mot de passe !';
  }
  else{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $idUsers =  $_SESSION['id'];
        $admin = $bdd->query("SELECT admin FROM users WHERE id = $idUsers" );
        if ($admin->fetch()[0] != 'y'){
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