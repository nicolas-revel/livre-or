<?php

require_once('../config/config.php');

$comment_success = add_comment($_POST, $_SESSION, $database);

if ($comment_success == true) {
  header('Location:livre-or.php');
}

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
  <title>Votre commentaire - La Guarrigue</title>
</head>

<body class="d-flex flex-column justify-content-between align-items-center h-100">
  <?php require_once('../config/header.php') ?>
  <?php if (!empty($_SESSION)) : ?>
    <main class="container d-flex flex-column justify-content-between p-4 rounded" id="maincomment">
      <h1 class="display-4 mb-5">Laissez nous un avis sur votre passage !</h1>
      <form action="commentaire.php" method="POST">
        <div class="form-group mr-5 ml-5 mb-5">
          <textarea name="commentaire" id="commentaire" class="form-control" cols="30" rows="10" placeholder="Votre commentaire ici ..."></textarea>
        </div>
        <button type="submit" class="btn btn-dark align-self-end">Envoyer</button>
      </form>
    </main>
  <?php else : ?>
    <main class="container rounded-lg w-auto">
      <p class="alert alert-danger">Pour accéder à cette page, veuillez d'abord vous connecter.</p>
      <p class="alert alert-warning">Vous allez être redirigé vers la page d'accueil.</p>
    </main>
    <?php header('refresh:3,' . $root_index . 'index.php') ?>
  <?php endif; ?>
  <?php require_once('../config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>