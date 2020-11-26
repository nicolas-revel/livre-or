<?php

require_once('../config/config.php');

$table_users = list_users($database);

if (!empty($_POST['login'])) {
  $verif_user = check_user($table_users);
} else {
  $verif_user = null;
}

if (!empty($_POST['password'])) {
  $verif_password = check_password($_POST['password'], $_POST['c_password']);
} else {
  $verif_password = null;
}

if (isset($_POST['submit'])) {
  $up_user = upd_account($database, $_POST, $verif_user, $verif_password);
}

var_dump($verif_password);
// var_dump($_SERVER);

$root_index = "../";
$root_pages = "";
$root_css = "../css/";

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $root_css ?>custom.css">
  <title>Votre profil - Livre d'or</title>
</head>

<body>
  <?php require('../config/header.php') ?>
  <main>
    <form action="profil.php" method="POST">
      <p>Mon nom d'utilisateur : <?= $_SESSION['login'] ?></p>
      <input type="text" name="login" id="login" placeholder="Modifier votre nom d'utilisateur">
      <input type="password" name="password" id="password" placeholder="Modifier votre mot de passe">
      <input type="password" name="c_password" id="c_password" placeholder="Confirmez votre nouveau mot de passe">
      <button type="submit" name="submit">Mettre à jour</button>
    </form>
    <?php if (isset($verif_user) && $verif_user === false) : ?>
      <p>Ce nom d'utilisateur existe déjà.</p>
    <?php endif; ?>
    <?php if (isset($verif_password) && $verif_password === false) : ?>
      <p>Merci de bien confirmer votre mot de passe.</p>
    <?php endif; ?>
  </main>
  <?php require_once('../config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>