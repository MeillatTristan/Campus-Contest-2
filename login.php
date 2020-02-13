<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>

    <h2>Se connecter à Manga++</h2>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Se Connecter</button>

    <div id="id01" class="modal">
      
      <form class="modal-content animate" action="/index.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="image.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
          <label for="uname"><b>Identifiant</b></label>
          <input type="text" placeholder="Identifiant" name="uname" required>

          <label for="psw"><b>Mot de passe</b></label>
          <input type="password" placeholder="Mot de passe" name="psw" required>
            
          <button type="submit">Se Connecter</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
          </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Retour</button>
          <span class="psw"> <a href="#">Mot de passe oublié ?</a></span>
        </div>
      </form>
    </div>

  <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>

  </body>
</html>
