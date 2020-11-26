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
  <title>Votre profil - La Guarrigue</title>
</head>

<body class="d-flex flex-column justify-content-between align-items-center h-100">
  <?php require_once('../config/header.php') ?>
  <?php if (!empty($_SESSION)) : ?>
    <main class="container p-4 rounded-lg w-25" id="mainprofil">
      <form action="profil.php" method="POST">
        <p>Mon nom d'utilisateur : <?= $_SESSION['login'] ?></p>
        <div class="form-group">
          <input type="text" name="login" id="login" class="form-control" placeholder="Modifier votre nom d'utilisateur">
        </div>
        <div class="form-group">
          <input type="password" name="password" id="password" class="form-control" placeholder="Modifier votre mot de passe">
        </div>
        <div class="form-group">
          <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirmez votre nouveau mot de passe">
        </div>
        <button type="submit" name="submit" class="btn btn-dark">Mettre à jour</button>
      </form>
      <?php if (isset($verif_user) && $verif_user === false) : ?>
        <p class="alert alert-danger mt-3 mb-0">Ce nom d'utilisateur existe déjà.</p>

      <?php endif; ?>
      <?php if (isset($verif_password) && $verif_password === false) : ?>
        <p class="alert alert-danger mt-3 mb-0">Merci de bien confirmer votre mot de passe.</p>
      <?php endif; ?>
    </main>
  <?php else : ?>
    <main class="container rounded-lg w-auto">
      <p class="alert alert-danger">Pour accéder à cette page, veuillez d'abord vous connecter.</p>
      <p class="alert alert-warning">Vous allez être redirigé vers la page d'accueil.</p>
    </main>
    <?php header('refresh:3,' . $root_index . 'index.php') ?>
  <?php endif ?>
  <?php require_once('../config/footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>