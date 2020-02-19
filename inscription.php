<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>inscription</title>
</head>
<body>
<!-- formulaire appellé lors de l'inscription ou de la modification des infos -->
  <?php
    if(isset($_SESSION['id'])){
      header('Location: index.php');
    }
  ?>
  <form action="createUser.php" method="post">

    <label for="name">Nom :</label>
    <input type="text" id="name" name="user_name" minlength="2" required>

    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="user_firstname" minlength="2" required>

    <label class="mail" for="mail">e-mail :</label>
    <?php
    if (isset($_REQUEST['badEmail'])){
      echo "<label class='badEmail'>email déjà utilisé</label>";
    }

    ?>
    <input type="email" id="mail" name="user_mail" minlength="2" required>

    <label for="phone">Numéro de téléphone :</label>
    <input type="text" id="phone" name="phone" minlength="6" required>

    <label for="password">Mot de Passe (8 caractère minimum):</label>
    <input type="password" id="password" name="password" minlength="8" required>

    <input type="submit" value="Valider">
  </form>
</body>
</html>