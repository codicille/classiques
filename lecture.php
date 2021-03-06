﻿<?php require_once('includes/config.php'); ?>
<?php
$lecture = null;
if(isset($_GET['oeuvre'])) {
  $oeuvre_param = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['oeuvre']);
  $chemin = "oeuvres/$oeuvre_param.html";

  if(file_exists($chemin)) {
    $lecture = $chemin;
    $oeuvre = $bibliotheque->oeuvres->{$oeuvre_param};
  } else {
    header('HTTP/1.0 404 Not Found');
    die;
  }
}
?>
<!DOCTYPE html>
  <html lang="fr">
  <head>
    <title><?php echo $oeuvre->meta_titre; ?></title>
    <meta name="description" content="<?php echo $oeuvre->meta_description; ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../liseuse/css/edsa.css">
    <link href='//fonts.googleapis.com/css?family=PT+Serif|Source+Code+Pro|Open+Sans:400,600,700' rel='stylesheet'>
  </head>
  <body class="theme-5 show-font-size-menu">
    <header>
      <div class="advanced-menu">
        <ul class="left">
          <li><a href="javascript:" class="library" data-hook="back-library"><span>Bibliothèque</span></a></li>
          <li><a class="book" href="javascript:" data-hook="toggle-summary"><span data-icon="b" class="icon-books"></span></a></li>
        </ul>
        <h1>
          <div class="wrap">
            <span class="book-title">
              <span class="author" data-hook="author"></span>
              <span class="title" data-hook="textTitle"></span>
            </span>
          </div>
        </h1>
        <ul class="right">
          <li class="readability-settings-container">
            <a href="#" data-hook="toggle-submenu" class="font-sizes-wrap">
              <span class="icon-fonts">
                <span data-icon="a" class="icon-small-font"></span>
                <span data-icon="a" class="icon-big-font"></span>
              </span>
            </a>
          </li>
          <li class="last">
            <a href="#" class="close-advanced-menus blue-button" data-hook="close-advanced-menu">
              <span data-icon="x" class="icon-close"></span>
            </a>
          </li>
        </ul>
      </div>
      <a href="#" class="button-advanced-menus" data-hook="show-advanced-menu"><span data-icon="…" class="icon-more icon-b"></span></a>
    </header>

    <div class="submenu readability-settings">
      <div class="columns">
        <div class="column column-1">
          <section class="contrast">
            <span class="submenu-title">Contraste texte/fond</span>
            <div class="columns">
              <span class="icon-moon contrast-icon" data-icon="m"></span>
              <div class="slider-container column">
                <div>
                  <span class="slider"></span>
                  <div class="contrast-colors">
                    <span style="background-color: #1590b0;"></span>
                    <span style="background-color: #17a0c3;"></span>
                    <span style="background-color: #19afd5;"></span>
                    <span style="background-color: #1cc0e9;"></span>
                    <span style="background-color: #1ecffc;"></span>
                  </div>
                </div>
              </div>
              <span class="icon-sun contrast-icon" data-icon="s"></span>
            </div>
          </section>

          <section class="text-options">
            <span class="submenu-title">Texte</span>
            <div class="extruded">
              <ul class="text-options-menu">
                <li><a href="#" data-hook="show-text-settings-menu" data-setting="font-size" class="font-size-switcher">Taille</a></li>
                <li><a href="#" data-hook="show-text-settings-menu" data-setting="line-height" class="line-height-switcher">Interligne</a></li>
                <li><a href="#" data-hook="show-text-settings-menu" data-setting="font-family" class="font-family-switcher">Police</a></li>
                <li><a href="#" data-hook="show-text-settings-menu" data-setting="alignment" class="alignment-switcher">Alignement</a></li>
              </ul>

              <div class="toggleable-content buttons-list font-size">
                <a href="#" data-font-size="1" class="font-size-x-small">A</a>
                <a href="#" data-font-size="1.2" class="font-size-small">A</a>
                <a href="#" data-font-size="1.4" class="font-size-medium active">A</a>
                <a href="#" data-font-size="1.7" class="font-size-large">A</a>
                <a href="#" data-font-size="1.9" class="font-size-x-large">A</a>
              </div>

              <div class="toggleable-content buttons-list line-height">
                <a href="#" data-hook="change-line-height" data-line-height="1.4" class="line-height-14">&#xe001;</a>
                <a href="#" data-hook="change-line-height" data-line-height="1.5" class="line-height-15">&#xe002;</a>
                <a href="#" data-hook="change-line-height" data-line-height="1.6" class="line-height-16 active">&#xe003;</a>
                <a href="#" data-hook="change-line-height" data-line-height="1.7" class="line-height-17">&#xe004;</a>
                <a href="#" data-hook="change-line-height" data-line-height="1.8" class="line-height-18">&#xe005;</a>
              </div>

              <div class="toggleable-content buttons-list font-family">
                <a href="#" data-hook="change-font" data-font-direction="-1" class="js-next-font"><span class="left-triangle"></span></a>
                <div class="font-preview">
                  <span class="example js-font-example font-times">Aa</span>
                  <span class="font-name js-font-name">Times</span>
                </div>
                <a href="#" data-hook="change-font" data-font-direction="1" class="js-previous-font"><span class="right-triangle"></span></a>

                <select name="fonts" class="js-font-choices hidden">
                  <option value="helvetica">Helvetica</option>
                  <option value="times">Times</option>
                  <option value="source-code">Source Code</option>
                  <option value="pt-serif">PT Serif</option>
                  <option value="open-sans">Open Sans</option>
                </select>
              </div>

              <div class="toggleable-content buttons-list alignment">
                <a href="#" data-hook="change-alignment" data-alignment="left" class="alignment-left active">l</a>
                <a href="#" data-hook="change-alignment" data-alignment="justify" class="alignment-justify">j</a>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

    <section role="main" class="font-times">
      <div class="wrap">
        <?php require $lecture; ?>
      </div>
    </section>

    <div class="veil"></div>

    <footer>
      <div class="wrap">
        <div class="advanced-menu">
          <div class="timeline">
            <span class="line"></span>
          </div>
          <div class="anchors">
            <div class="button">§<span data-hook="current-paragraph">1</span>/<span data-hook="paragraph-count">1</span></div>
            <div class="popup popup-with-tip">
              <div class="columns">
                <div class="column column-1">
                  <span>Paragraphe</span>
                  <select name="par"></select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="js-startup-hint startup-hint hidden">
      <div class="modal-wrap">
        <div class="modal js-modal-content">
          <p class="intro">
            <strong>Bonjour!</strong><br>
            Est-ce votre première utilisation de la liseuse?
          </p>
          <p>
            Touchez l'écran pour accéder aux <strong>réglages</strong>, ou utilisez <span class="nowrap">l'icône <span data-icon="…" class="icon-more icon-b"></span><!--<span class="settings-icon-preview">•••</span>--></span> qui se cache en haut.
          </p>
          <p>Tapez dans le quart inférieur de l'écran pour <strong>défiler d'une page.</strong></p>
          <a href="#" class="flat-button js-modal-close">OK</a>
        </div>
        <div class="settings-hint-line"></div>
        <div class="scroll-hint-line"></div>
      </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
    <script src="../liseuse/js/edsa.js"></script>
    <script>
      var EDSA = new EDSA({
        backButtonUrl: '/fiche/<?php echo $oeuvre_param; ?>'
      });
      EDSA.init();
    </script>
  </body>
</html>