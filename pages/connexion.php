<?php

require_once('../config/config.php');

$table_users = list_users($database);

$connex_state = connex_users($table_users);

if ($connex_state === true) {
  header('Location:../index.php');
}

$root_index = "../";
$root_pages = "";
$root_css = "../css/";


?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
  <title>Connexion - La Guarrigue</title>
</head>

<body class="d-flex flex-column justify-content-between align-items-center h-100">
  <?php require_once('../config/header.php') ?>
  <main class="container p-4 rounded-lg w-25" id="mainconnex">
    <form action="connexion.php" method="POST">
      <div class="form-group">
        <input type="text" name="login" class="form-control" id="login" placeholder="Votre login" required autofocus>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe" required>
      </div>
      <button type="submit" value="submit" class="btn btn-dark mt-3">Se connecter</button>
    </form>
    <?php if (!empty($_POST) && $connex_state !== true) : ?>
      <p class="alert alert-danger mt-4 mb-0">Votre nom d'utilisateur ou votre mot de passe est incorect.</p>
    <?php endif; ?>
  </main>
  <?php require_once('../config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>