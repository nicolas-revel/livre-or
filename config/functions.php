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
    if ($str1 !== $str2) {
      return false;
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

function set_user($user)
{
  if (!empty($user)) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['password'] = $user['password'];
    return ($_SESSION);
  }
}

function connex_users(array $table1)
{
  if (!empty($_POST)) {
    $str1 = $_POST['password'];
    foreach ($table1 as $user) {
      $verifstr1 = password_verify($str1, $user['password']);
      if (($_POST['login']) == ($user['login']) && ($verifstr1) == true) {
        set_user($user);
        return true;
        break;
      } else {
      }
    }
  }
}

function upd_account($db, $form, $check_user, $check_pass)
{
  if (!empty($form)) {
    if (!empty($form['login']) && $check_user !== false) {
      $_SESSION['login'] = mysqli_real_escape_string($db, htmlspecialchars($form['login']));
    }
    if (!empty($form['password']) && $check_pass === true) {
      $_SESSION['password'] = password_hash($form['password'], PASSWORD_BCRYPT);
    }
    $id = $_SESSION['id'];
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $requete =  "UPDATE `utilisateurs` SET `login`= '$login',`password`= '$password' WHERE `id`='$id'";
    mysqli_query($db, $requete);
    return true;
  }
}

function add_comment(array $form, array $user_info, $db)
{
  if (!empty($form['commentaire'])) {
    $commentaire = mysqli_real_escape_string($db, htmlentities($form['commentaire']));
    $id_utilisateur = mysqli_real_escape_string($db, htmlentities($user_info['id']));
    $requete = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id_utilisateur', NOW())";
    $result = mysqli_query($db, $requete);
    return $result;
  }
}

function list_comment($db): array
{
  $requete =  "SELECT commentaires.id, commentaire, id_utilisateur, utilisateurs.login, date, DATE_FORMAT(date, '%d') AS jour, DATE_FORMAT(date, '%c') AS mois, DATE_FORMAT(date, '%Y') AS annee, DATE_FORMAT(date, '%k') AS heure, DATE_FORMAT(date, '%i') AS minute FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC";
  $query_connexion = mysqli_query($db, $requete);
  while (($result_connexion = mysqli_fetch_assoc($query_connexion)) != null) {
    $tab_result[$result_connexion['id']] = $result_connexion;
  }
  return $tab_result;
}

function month_convert(array $comment)
{
  if (!empty($comment['mois'])) {
    if ($comment['mois'][0] == 0 && $comment['mois'][1] == 1) {
      $month = "Janvier";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 2) {
      $month = "Février";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 3) {
      $month = "Mars";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 4) {
      $month = "Avril";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 5) {
      $month = "Mai";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 6) {
      $month = "Juin";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 7) {
      $month = "Juillet";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 8) {
      $month = "Aout";
    } elseif ($comment['mois'][0] == 0 && $comment['mois'][1] == 9) {
      $month = "Septembre";
    } elseif ($comment['mois'][0] == 1 && $comment['mois'][1] == 0) {
      $month = "Octobre";
    } elseif ($comment['mois'][0] == 1 && $comment['mois'][1] == 1) {
      $month = "Novembre";
    } elseif ($comment['mois'][0] == 1 && $comment['mois'][1] == 2) {
      $month = "Décembre";
    } else {
    }
    return $month;
  }
}
