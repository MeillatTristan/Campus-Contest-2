<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/connexion.css">
  <title>connexion</title>
</head>
<body>
<!-- script appellé lors de la connexion en admin ou utlisateur -->
  <?php
    if(isset($_SESSION['id'])){
      header('Location: index.php');
    }
  ?>
  <h2 class="title">Connexion</h2>

  <form class="formulaire" action="authUser.php" method="post">

    <p class="box">
      <label for="mail">Email :</label>
      <input type="text" id="mail" name="email">
    </p>

    <p class="box">
      <label for="password">Mot de Passe (8 caractère minimum):</label>
      <input type="password" id="password" name="password" minlength="8" required>
    </p>

    <input type="submit" value="Valider">
  </form>
</body>
</html>