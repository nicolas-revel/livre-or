<?php

require_once('config/config.php');

var_dump($_SESSION);
// var_dump($_SERVER);

$root_index = "";
$root_pages = "pages/";

if (isset($_GET['d'])) {
  session_destroy();
  header('Location:' . $root_index . 'index.php');
}
/*
Page d'accueil qui présente le site.
Lorsque l'utilisateur n'est pas connecté :
  - Page d'inscription envoie vers la page de connexion
  - Page de connexion
  - Page du livre d'or
Lorsque l'utilisateur est connecté : 
  - Page de profil utilisateur
  - Page de livre d'or
    - Bouton pour aller vers le formulaire de commentaire
  - Bouton de déconnection
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
  <?php require('config/header.php') ?>
  <main>
    <?php if (!empty($_SESSION)) : ?>
      <h1>Bonjour <?= $_SESSION['login'] ?> !</h1>
      <p>Bienvenue sur le livre d'or de notre maison d'hôte ! N'hésitez pas à <strong><a href="pages/commentaire.php">laisser un commentaire</a></strong> sur votre séjour.</p>
      <p>Notre site est encore en cours de construction, bientôt il vous sera possible de réserver via notre site ou de faire une visite virtuelle.</p>
      <p>Si vous souhaitez consulter les commentaires des précédents voyageurs, vous pouvez vous rendre la page dédiée au <strong><a href="pages/livre-or.php">livre d'or</a></strong>.</p>
    <?php else : ?>
      <h1>Bonjour !</h1>
      <p>Bienvenue sur le livre d'or de notre maison d'hôte !</p>
      <p>Vous pouvez consulter les différents avis laissé par les précédents voyageurs dans la section "<strong><a href="pages/livre-or.php">Livre d'or</a></strong>".</p>
      <p>Si vous souhaitez laisser un avis sur votre séjour au sein de notre gite, nous vous invitons à <strong><a href="pages/inscription.php">vous inscrire</a></strong> via notre formulaire de d'inscription puis à <strong><a href="pages/connexion.php">vous connecter</a></strong>.</p>
      <p>Si vous êtes déjà inscrit, vous pouvez <strong><a href="pages/inscription.php">vous connecter</a></strong> directement via notre formulaire d'inscription.</p>
    <?php endif; ?>
  </main>
</body>

</html>