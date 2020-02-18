<?php
   try
   {
      //ouverture base de donnée en mode objet;
      $bdd = new PDO('mysql:host=localhost;dbname=manga++;charset=utf8', 'root', '');
      //fonction pour affichage des erreurs mySql;
      $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
   }
   catch (Exception $e)
   {
      echo "Connexion impossible";
   }

 ?>