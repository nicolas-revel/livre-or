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

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre profil - Livre d'or</title>
</head>

<body>
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
</body>

</html>