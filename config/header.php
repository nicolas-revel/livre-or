<header>
  <?php if (!empty($_SESSION)) : ?>
    <nav>
      <ul>
        <li><a href="<?= $root_index ?>index.php">Accueil</a></li>
        <li><a href="<?= $root_pages ?>livre-or.php">Livre d'or</a></li>
        <li><a href="<?= $root_pages ?>profil.php">Mon profil</a></li>
        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?d"><button>Déconnexion</button></a></li>
      </ul>
    </nav>
  <?php else : ?>
    <nav>
      <ul>
        <li><a href="<?= $root_index ?>index.php">Accueil</a></li>
        <li><a href="<?= $root_pages ?>livre-or.php">Livre d'or</a></li>
        <li><a href="<?= $root_pages ?>connexion.php">Se connecter</a></li>
        <li><a href="<?= $root_pages ?>inscription.php">S'inscrire</a></li>
      </ul>
    </nav>
  <?php endif; ?>
</header>