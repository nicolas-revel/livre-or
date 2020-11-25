<?php

require_once('../config/config.php');

$comment_success = add_comment($_POST, $_SESSION, $database);

if ($comment_success == true) {
  header('Location:livre-or.php');
}

$root_index = "../";
$root_pages = "";

if (isset($_GET['d'])) {
  session_destroy();
  header('Location:' . $root_index . 'index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre commentaire - Livre d'or</title>
</head>

<body>
<?php require('../config/header.php') ?>
  <main>
    <?php if (!empty($_SESSION)) : ?>
      <form action="commentaire.php" method="POST">
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire ici ..."></textarea>
        <button type="submit">Envoyer</button>
      </form>
    <?php else : ?>
      <p>Vous devez être connecté pour accéder à cette session.</p>
    <?php endif; ?>
  </main>
</body>

</html>