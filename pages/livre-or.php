<?php

require_once('../config/config.php');

$table_comment = list_comment($database);

$root_index = "../";
$root_pages = "";
$root_css = "../css/";

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
  <title>Vos commentaires - Livre d'or</title>
</head>

<body class="d-flex flex-column justify-content-between align-items-start h-100">
  <?php require_once('../config/header.php') ?>
  <main class="container d-flex flex-column justify-content-between align-items-center">
    <?php if (!empty($_SESSION)) : ?>
      <div class="row d-flex flex-column justify-content-between m-2 p-4 bg-light rounded-lg">
        <p>Vous souhaitez ajouter un commentaire ? Suivez le lien-ci-dessous pour ajouter un nouveau commentaire à notre livre d'or.</p>
        <a href="commentaire.php"><button class="btn btn-primary">Ajouter un commentaire</button></a>
      </div>
    <?php endif; ?>
    <div class="row d-flex justify-content-between m-3">
      <?php foreach ($table_comment as $comment) : ?>
        <div class="card m-2" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $comment['login'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Le <?= $comment['jour'] ?> <?= month_convert($comment) ?> <?= $comment['annee'] ?> à <?= $comment['heure'] ?>:<?= $comment['minute'] ?></h6>
            <p class="card-text"><?= $comment['commentaire'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <?php require_once('../config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>