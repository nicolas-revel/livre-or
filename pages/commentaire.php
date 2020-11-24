<?php

require_once('../config/config.php');

$comment_success = add_comment($_POST, $_SESSION, $database);

if ($comment_success == true) {
  header('Location:livre-or.php');
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