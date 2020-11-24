<?php

require_once('../config/config.php');

$table_users = list_users($database);

$connex_state = connex_users($table_users);

if ($connex_state === true) {
  header('Location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Livre d'or</title>
</head>

<body>
  <main>
    <form action="connexion.php" method="POST">
      <input type="text" name="login" id="login" placeholder="Votre login">
      <input type="password" name="password" id="password" placeholder="Votre mot de passe">
      <button type="submit" value="submit">Se connecter</button>
    </form>
  </main>
</body>

</html>