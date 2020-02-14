<?php

  $name = $_REQUEST['user_name'];
  $firstname = $_REQUEST['user_firstname'];
  $mail = $_REQUEST['user_mail'];
  $phone = $_REQUEST['phone'];
  $password = $_REQUEST['password'];

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=manga++;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  }
  catch (Exception $e)
  {
    echo "Connexion impossible";
  }

  $bdd->query("INSERT INTO users (nom, prenom, email, numéro, password, admin) VALUES ('$name', '$firstname', '$mail', $phone, '$password', 'n')");
  header('Location: connexion.php');
?>