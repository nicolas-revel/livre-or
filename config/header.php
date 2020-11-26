<header class="align-self-stretch">
  <?php if (!empty($_SESSION)) : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?= $root_index ?>index.php">La Guarrigue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto d-inline-flex align-items-center">
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/index.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_index ?>index.php">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/livre-or.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_pages ?>livre-or.php">Livre d'or</a>
          </li>
          <li class="nav-item<?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/profil.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_pages ?>profil.php">Mon profil</a>
          </li>
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/inscription.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?php $_SERVER['PHP_SELF'] ?>?d"><button class="btn btn-primary m-0">Déconnexion</button></a>
          </li>
      </div>
    </nav>
  <?php else : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?= $root_index ?>index.php">La Guarrigue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/index.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_index ?>index.php">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/livre-or.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_pages ?>livre-or.php">Livre d'or</a>
          </li>
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/connexion.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_pages ?>connexion.php">Se connecter</a>
          </li>
          <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/livre-or/pages/inscription.php') : ?>active<?php endif; ?>">
            <a class="nav-link" href="<?= $root_pages ?>inscription.php">S'inscrire</a>
          </li>
      </div>
    </nav>
  <?php endif; ?>
</header>