<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if ($path == '/') {
  $module = 'index';
} elseif (preg_match('/^\/a-propos$/', $path)) {
  $module = 'a-propos';
} elseif (preg_match('/^\/fiche\/([^\.\/]+)\/?$/', $path, $matches)) {
  $module = 'fiche';
  $_GET['oeuvre'] = $matches[1];
} elseif (preg_match('/^\/([^\.\/]+)\/?$/', $path, $matches)) {
  $module = 'lecture';
  $_GET['oeuvre'] = $matches[1];
}

if(!empty($module)) {
  require("$module.php");
} else {
  return false;
}