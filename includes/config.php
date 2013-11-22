<?php
require __DIR__.'/oeuvre.php';

$bibliotheque = json_decode(file_get_contents('bibliotheque.json'));
foreach ($bibliotheque->oeuvres as $tag => $oeuvre) {
  $bibliotheque->oeuvres->$tag = new Oeuvre($oeuvre);
}