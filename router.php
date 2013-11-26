<?php
if ($_SERVER["REQUEST_URI"] == '/') {
  $module = 'index';
} elseif (preg_match('/^\/fiche\/([^\.\/]+)\/?$/', $_SERVER["REQUEST_URI"], $matches)) {
  $module = 'fiche';
  $_GET['oeuvre'] = $matches[1];
} elseif (preg_match('/^\/([^\.\/]+)\/?$/', $_SERVER["REQUEST_URI"], $matches)) {
  $module = 'lecture';
  $_GET['oeuvre'] = $matches[1];
}

if(!empty($module)) {
  require("$module.php");
} else {
  return false;
}