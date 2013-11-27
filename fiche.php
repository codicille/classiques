<?php require_once('includes/config.php'); ?>
<?php
$oeuvre = null;
if(isset($_GET['oeuvre'])) {
  $oeuvre_param = $_GET['oeuvre'];
  $oeuvre = $bibliotheque->oeuvres->{$oeuvre_param};

  $head_titre = $oeuvre->meta_titre;
  $head_description = $oeuvre->meta_description;

  if(!$oeuvre) {
    header('HTTP/1.0 404 Not Found');
    die;
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
  <?php require_once('includes/head.php') ?>
  <body>
    <div class="wrap">
      <div class="header-outer">
        <header>
          <a href="/" class="top-banner">
            <span class="back-wrap"><span class="back">Revenir à la liste des œuvres</span></span>
            <span class="site-title">Classiques de la littérature québécoise</span>
          </a>
          <div class="intro">
            <h1><?php echo $oeuvre->titre; ?></h1>
            <h2><?php echo $oeuvre->auteur; ?></h2>
          </div>
        </header>
      </div>

      <div class="main-outer">
        <div class="main">
          <div class="book-wrap">
            <div class="book-infos js-tabs-wrap">
              <a class="flat-btn-preview heading" href="/<?php echo $_GET['oeuvre'] ?>">Lire maintenant</a>

              <div class="book-infos-tabs js-tabs">
                <a href="#description" class="active">Description</a>
                <a href="#choix-etudes">Choix d'études</a>
                <a href="#notes-edition">Note sur l’édition</a>
              </div>

              <div class="tabs-content js-tabs-content">
                <h3 id="description">Description</h3>
                <p><?php echo $oeuvre->description ?></p>
              </div>

              <?php if (is_array($oeuvre->etudes)): ?>
                <div class="tabs-content js-tabs-content">
                  <h3 id="choix-etudes">Choix d'études</h3>
                  <?php foreach($oeuvre->etudes as $etude): ?>
                    <p><?php echo join($etude, ', ') ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>

              <?php if (is_object($oeuvre->notes_edition)): ?>
                <div class="tabs-content js-tabs-content">
                  <h3 id="notes-edition">Note sur l’édition</h3>
                  <?php foreach($oeuvre->notes_edition as $nom => $note): ?>
                    <?php if (strpos($note, '/') === 0 || strpos($note, 'http') === 0): ?>
                      <p><a target="_blank" href="<?php echo $note ?>"><?php echo $nom ?></a></p>
                    <?php else: ?>
                      <p><?php echo $nom ?> : <?php echo $note ?></p>
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>
            <div class="book-preview">
              <img class="book-thumb" src="/oeuvres/img/<?php echo $oeuvre_param ?>.jpg">
              <a class="flat-btn-preview" href="/<?php echo $_GET['oeuvre'] ?>">Lire maintenant</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
  </body>
</html>