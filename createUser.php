<?php
//script appellé lors de la creation d'un nouvel utilisateur dans la base de données
  $name = $_REQUEST['user_name'];
  $firstname = $_REQUEST['user_firstname'];
  $mail = $_REQUEST['user_mail'];
  $phone = $_REQUEST['phone'];
  $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  include 'configbdd.php';

  $users = $bdd->query("SELECT * FROM users");
  while ($user = $users->fetch()){
    if ($user['email'] == $mail){
      $bademail = "y";
      header("Location: creationDeCompte.php?badEmail=y");
    }
  }
  //insert dans la bdd les infos rentrer par l'utilisateur dans la table users
  if ($bademail != "y"){
  $bdd->query("INSERT INTO users (name, firstname, email, number, password, admin) VALUES ('$name', '$firstname', '$mail', $phone, '$password', 'n')");
  header('Location: index.php');
  }
?>