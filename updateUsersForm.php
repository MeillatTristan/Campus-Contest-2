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
  session_start();
  include 'configbdd.php';
  $idUsersModif = $_REQUEST['idMaj'];
  $admin = $bdd->query("SELECT admin FROM users WHERE id = ".$_SESSION['id'])->fetch()[0];
  if(isset($_SESSION['id'])){
    if (($_SESSION['id'] == $idUsersModif || $admin = 'y'))
      echo "veuillez vous connectez pour accéder à cette page";
    }
  else{
    $userName = $bdd->query("SELECT name FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userFirstname = $bdd->query("SELECT firstname FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userMail = $bdd->query("SELECT email FROM users WHERE id = $idUsersModif")->fetch()[0];
    $userNum = $bdd->query("SELECT number FROM users WHERE id = $idUsersModif")->fetch()[0];
    ?>
    <form action="updateUsers.php" method="post">

      <input type="hidden" name="userIdModif" value="<?php echo"$idUsersModif" ?>">

      <label for="name">Nom :</label>
      <input type="text" id="name" name="user_name" value='<?php echo"$userName" ?>'>

      <label for="firstname">Prénom :</label>
      <input type="text" id="firstname" name="user_firstname" value='<?php echo"$userFirstname" ?>'>

      <label for="mail">e-mail :</label>
      <input type="email" id="mail" name="user_mail" value='<?php echo"$userMail"?>'>

      <label for="phone">Numéro de téléphone :</label>
      <input type="text" id="phone" name="phone" value='<?php echo"$userNum" ?>'>

      <label for="password">Mot de Passe (8 caractère minimum):</label>
      <input type="password" id="password" name="password" minlength="8" required>

      <input type="submit" value="Valider">
    </form>
    <?php
  }
?>
</body>
</html>