<?php

function list_users($db): array
{
  $requete =  "SELECT * FROM `utilisateurs`";
  $query_connexion = mysqli_query($db, $requete);
  while (($result_connexion = mysqli_fetch_assoc($query_connexion)) != null) {
    $tab_logs[$result_connexion['id']] = $result_connexion;
  }
  return $tab_logs;
}

function check_user(array $table)
{
  foreach ($table as $user) {
    if ($user['login'] == $_POST['login']) {
      return false;
      break;
    } else {
    }
  }
}

function check_password(string $str1, string $str2)
{
  if (isset($str1, $str2)) {
    $str1hash = password_hash($str1, PASSWORD_BCRYPT);
    $str2hash = password_hash($str2, PASSWORD_BCRYPT);
    $verifstr1 = password_verify($str1, $str1hash);
    $verifstr2 = password_verify($str2, $str2hash);
    if ($str1 === $str2 && $verifstr1 == true && $verifstr2 == true) {
      return true;
    } else {
    }
  }
}

function crea_account($db)
{
  if (
    !empty($_POST['login']) &&
    !empty($_POST['password']) &&
    !empty($_POST['c_password'])
  ) {
    $login = mysqli_real_escape_string($db, htmlspecialchars($_POST['login']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $requete =  "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login', '$password')";
    mysqli_query($db, $requete);
    return true;
  }
}