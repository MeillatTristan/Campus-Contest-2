<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php
  if(!isset($_SESSION['id'])){
      echo "veuillez vous connectez pour accéder à cette page";
    }
  else{
    include 'configbdd.php';
    $idUsersModif = $_REQUEST['idMaj'];
    $userName = $bdd->query("SELECT name FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userFirstname = $bdd->query("SELECT firstname FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userMail = $bdd->query("SELECT mail FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userNum = $bdd->query("SELECT number FROM users WHERE id = $idUsersModif")->fetch()[0];
    ?>
    <form action="updateUsers.php" method="post">

      <input type="hidden" name="userIdModif" value="<?php $idUsersModif ?>">

      <label for="name">Nom :</label>
      <input type="text" id="name" name="user_name" value='<?php $userName ?>'>

      <label for="firstname">Prénom :</label>
      <input type="text" id="firstname" name="user_firstname" value='<?php $userFirstname ?>'>

      <label for="mail">e-mail :</label>
      <input type="email" id="mail" name="user_mail" value='<?php $userMail?>'>

      <label for="phone">Numéro de téléphone :</label>
      <input type="text" id="phone" name="phone" value='<?php $userNum ?>'>

      <label for="password">Mot de Passe (8 caractère minimum):</label>
      <input type="password" id="password" name="password" minlength="8" required>

      <input type="submit" value="Valider">
    </form>
    <?php
  }
?>
</body>
</html>