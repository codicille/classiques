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
        <div class="book-wrap">
          <div class="book-infos">
            <div class="book-infos-nav">
              <a href="#" class="active">Description</a>
              <a href="#">Choix d'études</a>
              <a href="#">Informations complémentaires</a>
            </div>

            <p>Maria a dix-huit ans et vit sur une terre de colonisation au Lac Saint-Jean. Trois hommes la courtisent, trois destins s'offrent à Maria : François Paradis, Lorenzo Surprenant et Eutrope Gagnon. Le premier est un bucheron épris de liberté, le second est citadin aux États-Unis et le troisième est, comme le père de Maria, un colon. La mort de la mère de Maria, les qualités qu'on lui trouve, oriente Maria vers un rôle semblable.</p>
            <p>On raconte que Maria a réellement existé et aurait eu comme fils Philippe Chapdelaine.</p>
            <h3>Note sur l’édition</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
          </div>

          <div class="book-preview">
            <img class="book-thumb" src="/oeuvres/img/<?php echo $oeuvre_param ?>.jpg">
            <a class="flat-btn-preview" href="?lecture=<?php echo $_GET['oeuvre'] ?>">Ouvrir dans la liseuse</a>
          </div>
        </div>
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