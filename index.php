<?php

require_once('config/config.php');

$root_index = "";
$root_pages = "pages/";
$root_css = "css/";

if (isset($_GET['d'])) {
  session_destroy();
  header('Location:' . $root_index . 'index.php');
}

?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
  <title>Accueil - Livre d'or</title>
</head>

<body class="d-flex flex-column justify-content-between align-items-start h-100">
  <?php require_once('config/header.php') ?>
  <main class="container rounded-lg p-4" id="mainindex">
    <?php if (!empty($_SESSION)) : ?>
      <h1>Bonjour <?= $_SESSION['login'] ?> !</h1>
      <p>Bienvenue sur le livre d'or de notre maison d'hôte ! N'hésitez pas à <strong><a href="pages/commentaire.php">laisser un commentaire</a></strong> sur votre séjour.</p>
      <p>Notre site est encore en cours de construction, bientôt il vous sera possible de réserver via notre site ou de faire une visite virtuelle.</p>
      <p>Si vous souhaitez consulter les commentaires des précédents voyageurs, vous pouvez vous rendre la page dédiée au <strong><a href="pages/livre-or.php">livre d'or</a></strong>.</p>
    <?php else : ?>
      <div class="row mt-5 mb-4 ml-3">
        <h1>Bonjour !</h1>
      </div>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          <p>Bienvenue sur le livre d'or de notre maison d'hôte !</p>
          <p>Vous pouvez consulter les différents avis laissé par les précédents voyageurs dans la section "<strong><a href="pages/livre-or.php">Livre d'or</a></strong>".</p>
          <p>Si vous souhaitez laisser un avis sur votre séjour au sein de notre gite, nous vous invitons à <strong><a href="pages/inscription.php">vous inscrire</a></strong> via notre formulaire de d'inscription puis à <strong><a href="pages/connexion.php">vous connecter</a></strong>.</p>
          <p>Si vous êtes déjà inscrit, vous pouvez <strong><a href="pages/inscription.php">vous connecter</a></strong> directement via notre formulaire d'inscription.</p>
        </div>
        <div class="col-1"></div>
      </div>
    <?php endif; ?>
  </main>
  <?php require_once('config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>