<?php
  include "configbdd.php";

  $email = $_REQUEST["email"];
  $password = $_REQUEST['password'];

  $req = $bdd->prepare('SELECT id, password FROM users WHERE email = :email');
  $req->execute(array(
    'email' => $email));
  $resultat = $req->fetch();

  $isPasswordCorrect = password_verify($password, $resultat['password']);

  if (!$resultat)
{
    echo 'Mauvais email ou mot de passe !';
}

else{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
?>