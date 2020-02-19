<?php
//script de modification des infos uniquement si vous etes administrateur
  $id = $_REQUEST['userIdModif'];
  $name = $_REQUEST['user_name'];
  $firstname = $_REQUEST['user_firstname'];
  $mail = $_REQUEST['user_mail'];
  $phone = $_REQUEST['phone'];
  $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  include 'configbdd.php';
  $bdd->query("UPDATE users SET name='$name', firstname='$firstname', email='$mail', number=$phone, password='$password' WHERE id = $id");
  if (isset($_REQUEST['admin'])){
    $admin = $_REQUEST['admin'];
    $bdd->query("UPDATE users SET admin = '$admin' WHERE id = $id");
  }
  header('Location: profil.php');
?>