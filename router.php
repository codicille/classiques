<?php
if (preg_match('/^\/($|oeuvre|lecture)\/([^\/]+)\/?/', $_SERVER["REQUEST_URI"], $matches)) {
  # Homepage
  if($matches[0] == '/') {
    $module = 'index.php';
  } else {
    $module = $matches[1];
    $_GET['oeuvre'] = $matches[2];
  }
  require("$module.php");
}
else {
  return false;
}