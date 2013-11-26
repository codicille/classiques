<?php require_once('includes/config.php'); ?>
<!DOCTYPE html>
  <html lang="fr">
  <?php
  $head_description = 'Un recueil d’oeuvres québécoises avec leur contenu d’origine à lire en ligne gratuitement.';
  require_once('includes/head.php')
  ?>
  <body>
    <div class="header-outer">
      <header>
        <div class="top-banner">
          <h1>Classiques de la littérature québécoise</h1>
        </div>
        <div class="intro">
          <p class="desc">
            Les Classiques de la littérature québécoise visent à rendre disponibles au grand public
            des versions numériques validées des œuvres libres de droit du corpus littéraire québécois. </p>
          <p class="about-btn-wrap">
            <a href="/a-propos" class="flat-btn">À propos</a>
          </p>
        </div>
      </header>
    </div>

    <div class="main-outer">
      <div class="main">
        <ul class="classy-list">
          <?php foreach($bibliotheque->oeuvres as $tag => $oeuvre): ?>
          <li>
            <a href="/fiche/<?php echo $tag ?>" class="classy-list-item">
              <span class="classy-list-title"><?php echo $oeuvre->titre; ?></span>
              <span class="classy-list-desc"><?php echo $oeuvre->auteur; ?></span>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
  </body>
</html>