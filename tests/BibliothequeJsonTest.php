<?php
class BibliothequeJsonTest extends PHPUnit_Framework_TestCase
{
  public function testJsonSyntax()
  {
    $path = realpath(implode('/', array(__DIR__, '../bibliotheque.json')));
    $this->assertTrue(file_exists($path));

    $biblio = json_decode(file_get_contents($path));
    $this->assertObjectHasAttribute('oeuvres', $biblio);

    foreach ($biblio->oeuvres as $tag => $oeuvre) {
      $this->assertObjectHasAttribute('titre', $oeuvre);
      $this->assertObjectHasAttribute('auteur', $oeuvre);
      $this->assertObjectHasAttribute('description', $oeuvre);
    }
  }
}
?>