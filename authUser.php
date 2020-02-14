<?php
  $mail = $_REQUEST('user_mail');
  $password = $_REQUEST('password');

  $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
  $req->execute(array(
    'pseudo' => $pseudo));
  $resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

?>