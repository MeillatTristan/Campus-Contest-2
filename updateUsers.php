<?php
  $id = $_REQUEST['userIdModif'];
  $name = $_REQUEST['user_name'];
  $firstname = $_REQUEST['user_firstname'];
  $mail = $_REQUEST['user_mail'];
  $phone = $_REQUEST['phone'];
  $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  include 'configbdd.php';
  $bdd->query("UPDATE users SET name='$name', firstname='$firstname', email='$mail', number=$phone, password='$password' WHERE id = $id");
  header('Location: connexion.php');
?>