<?php

require_once('../config/functions.php');

/*
Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires.

Requêtes nécessaires : 
- Ajoute une ligne dans le tableau avec le commentaire, le id utilisateur, et la date et heure courante.

Logique nécessaire : 
- Fonction d'ajout de commentaire.
- La variable session avec l'id utilisateur, le login utilisateur
- Vérifier que l'utilisateur est bien connecté
- Formulaire de type post
- Rediriger vers la page de commentaire une fois que celui-ci a été ajouté

*/

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre commentaire - Livre d'or</title>
</head>

<body>
  <main>

  </main>
</body>

</html>