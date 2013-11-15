<?php
$bibliotheque = json_decode(file_get_contents('bibliotheque.json'));
$oeuvre = null;
$lecture = null;

// Afficher une oeuvre
if(isset($_GET['oeuvre'])) {
  $oeuvre_param = $_GET['oeuvre'];
  $oeuvre = $bibliotheque->oeuvres->{$oeuvre_param};
  if(!$oeuvre) {
    header('HTTP/1.0 404 Not Found');
    die;
  }
}

// Lire une oeuvre
if(isset($_GET['lecture'])) {
  $nom_secure = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['lecture']);
  $chemin = "oeuvres/$nom_secure.html";

  if(file_exists($chemin)) {
    $lecture = $chemin;
  } else {
    header('HTTP/1.0 404 Not Found');
    die;
  }
}
?>
<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Classiques de la littérature québécoise</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php if($oeuvre): ?>
      <div class="header-outer">
        <header>
          <div class="top-banner">
            <a href="/">Retour à la liste des œuvres</a>
          </div>
          <div class="intro">
            <h1><?php echo $oeuvre->titre; ?></h1>
            <h2><?php echo $oeuvre->auteur; ?></h2>
          </div>
        </header>
      </div>

      <div class="main">
        <a href="?lecture=<?php echo $_GET['oeuvre'] ?>">Lire</a>
      </div>

      <div class="footer-outer">
        <footer>
          <a href="http://www.crilcq.org/" target="_blank"><img src="img/crilcq.png" class="logo"></a>
        </footer>
      </div>
    <?php elseif($lecture): ?>
      <!-- Lecture d'une oeuvre -->
      <?php require $lecture ?>
    <?php else: ?>
      <div class="header-outer">
        <header>
          <div class="top-banner">
            <h1>Classiques de la littérature québécoise</h1>
          </div>
          <div class="intro">
            <p class="desc">
              Un recueil d’oeuvres québécoises avec leur contenu d’origine, ut enim ad minim veniam, quis nostrud exercitation ullamco.
            </p>
            <p class="about-btn-wrap">
              <a href="#" class="flat-btn">À propos</a>
            </p>
          </div>
        </header>
      </div>

      <div class="main">
        <ul class="classy-list">
          <?php foreach($bibliotheque->oeuvres as $tag => $oeuvre): ?>
          <li>
            <a href="?oeuvre=<?php echo $tag ?>" class="classy-list-item">
              <span class="classy-list-title"><?php echo $oeuvre->titre; ?></span>
              <span class="classy-list-desc"><?php echo $oeuvre->auteur; ?></span>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="footer-outer">
        <footer>
          <a href="http://www.crilcq.org/" target="_blank"><img src="img/crilcq.png" class="logo"></a>
        </footer>
      </div>
    <?php endif ?>
  </body>
</html>