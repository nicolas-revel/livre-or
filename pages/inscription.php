<?php

require_once('../config/config.php');

if (!empty($_POST)) {
  $users_table = list_users($database);
  $verif_user = check_user($users_table);
  if ($verif_user !== false) {
    $verif_pwd = check_password($_POST['password'], $_POST['c_password']);
    if ($verif_pwd !== false) {
      $crea_user = crea_account($database);
    }
  }
}

if (isset($crea_user) && $crea_user === true) {
  header('Location:connexion.php');
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
  <title>Inscription - Livre d'or</title>
</head>

<body>
<?php require('../config/header.php') ?>

  <main>
    <form action="inscription.php" method="POST">
      <input type="text" name="login" id="login" placeholder="Créez votre nom d'utilisateur">
      <input type="password" name="password" id="password" placeholder="Créez votre mot de passe">
      <input type="password" name="c_password" id="c_password" placeholder="Confirmez votre mot de passe">
      <button type="submit" name="submit">Valider mon inscription</button>
    </form>
    <?php if (isset($verif_user) && $verif_user === false) : ?>
      <p>Ce nom d'utilisateur existe déjà.</p>
    <?php endif; ?>
    <?php if (isset($verif_pwd) && $verif_pwd === false) : ?>
      <p>Merci de bien confirmer votre mot de passe.</p>
    <?php endif; ?>
  </main>
</body>

</html>