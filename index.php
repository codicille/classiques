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
            <a href="/" class="back">Revenir à la liste des œuvres</a>
          </div>
          <div class="intro">
            <h1><?php echo $oeuvre->titre; ?></h1>
            <h2><?php echo $oeuvre->auteur; ?></h2>
          </div>
        </header>
      </div>

      <div class="main-outer">
        <div class="main">
          <div class="book-wrap">
            <div class="book-infos">
              <h3>Description</h3>
              <p><?php echo $oeuvre->description ?></p>

              <?php if (isset($oeuvre->etudes) && is_array($oeuvre->etudes)): ?>
                <h4>Choix d'études</h4>
                <?php foreach($oeuvre->etudes as $etude): ?>
                  <?php
                    # Mise en forme du nom de l'ouvrage
                    if(isset($etude[1])) $etude[1] = "<em>$etude[1]</em>"
                  ?>
                  <p><?php echo join($etude, ', ') ?></p>
                <?php endforeach ?>
              <?php endif ?>

              <?php if (isset($oeuvre->notes_edition) && is_object($oeuvre->notes_edition)): ?>
                <h4>Note sur l’édition</h4>
                <?php foreach($oeuvre->notes_edition as $nom => $note): ?>
                  <?php if (strpos($note, '/') === 0 || strpos($note, 'http') === 0): ?>
                    <p><a target="_blank" href="<?php echo $note ?>"><?php echo $nom ?></a></p>
                  <?php else: ?>
                    <p><?php echo $nom ?> : <?php echo $note ?></p>
                  <?php endif ?>
                <?php endforeach ?>
              <?php endif ?>
            </div>
            <div class="book-preview">
              <img class="book-thumb" src="/oeuvres/img/<?php echo $oeuvre_param ?>.jpg">
              <a class="flat-btn-preview" href="?lecture=<?php echo $_GET['oeuvre'] ?>">Ouvrir dans <br>la liseuse</a>
            </div>
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

      <div class="main-outer">
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
      </div>

      <div class="footer-outer">
        <footer>
          <a href="http://www.crilcq.org/" target="_blank"><img src="img/crilcq.png" class="logo"></a>
        </footer>
      </div>
    <?php endif ?>
  </body>
</html>