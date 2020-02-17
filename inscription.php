<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>inscription</title>
</head>
<body>
  <?php
    if(isset($_SESSION['id'])){
      header('Location: index.php');
    }
  ?>
  <form action="createUser.php" method="post">

    <label for="name">Nom :</label>
    <input type="text" id="name" name="user_name">

    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="user_firstname">

    <label for="mail">e-mail :</label>
    <input type="email" id="mail" name="user_mail">

    <label for="phone">Numéro de téléphone :</label>
    <input type="text" id="phone" name="phone">

    <label for="password">Mot de Passe (8 caractère minimum):</label>
    <input type="password" id="password" name="password" minlength="8" required>

    <input type="submit" value="Valider">
  </form>
</body>
</html>