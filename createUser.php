<?php

  $name = $_REQUEST['user_name'];
  $firstname = $_REQUEST['user_firstname'];
  $mail = $_REQUEST['user_mail'];
  $phone = $_REQUEST['phone'];
  $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  include 'configbdd.php';
  $bdd->query("INSERT INTO users (name, firstname, email, number, password, admin) VALUES ('$name', '$firstname', '$mail', $phone, '$password', 'n')");
  header('Location: index.php');
?>