<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>connexion</title>
</head>
<body>
  <h2>Connexion</h2>

  <form action="authUser.php" method="post">

    <label for="mail">Email :</label>
    <input type="text" id="mail" mail="user_mail">

    <label for="password">Mot de Passe (8 caractère minimum):</label>
    <input type="password" id="password" name="password" minlength="8" required>

    <input type="submit" value="Valider">
  </form>
</body>
</html>