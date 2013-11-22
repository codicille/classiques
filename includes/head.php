<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no">
  <title><?php echo isset($head_titre) ? $head_titre : 'Classiques de la littérature québécoise' ?></title>
  <link rel="stylesheet" href="/css/styles.css">
  <?php if (isset($head_description)): ?>
    <meta name="description" content="<?php echo $head_description; ?>">
  <?php endif ?>

  <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
  <![endif]-->
</head>