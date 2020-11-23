<?php

require_once('../config/config.php');



/*
Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées.

Requête nécessaire : 
- Sélectionne toutes les colonnes dans la table utilisateur et affiche les dans un tableau associatif

Logique nécessaire :
- Fonction qui vérifie si le nom d'utilisateur donné à bien un mdp associé dans la BDD
- Fonction qui met dans la variable session l'id de l'utilisateur et son mdp
*/

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Livre d'or</title>
</head>

<body>
  <main>

  </main>
</body>

</html>