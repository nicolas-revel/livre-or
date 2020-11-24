<?php

require_once('../config/config.php');

$table_comment = list_comment($database);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vos commentaires - Livre d'or</title>
</head>

<body>
  <main>
    <table>
      <tbody>
        <?php foreach ($table_comment as $comment) : ?>
          <tr>
            <td>
              <h2><?= $comment['login'] ?></h2>
              <h3>Le <?= $comment['jour'] ?> <?= month_convert($comment) ?> <?= $comment['annee'] ?></h3>
              <p><?= $comment['commentaire'] ?></p>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>

</html>