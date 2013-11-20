<?php require_once('includes/config.php'); ?>
<?php
$lecture = null;
if(isset($_GET['oeuvre'])) {
  $nom_secure = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['oeuvre']);
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
  <?php require_once('includes/head.php'); ?>
  <body>
    <?php require $lecture; ?>
  </body>
</html>