<?php
class Oeuvre {
  public function __construct($json) {
    $this->json = $json;
  }

  public function __get($attribute) {
    if (method_exists($this, $attribute) === true) {
      return $this->$attribute();
    } elseif(isset($this->json->$attribute) === true) {
      return $this->json->$attribute;
    }
  }

  private function meta_titre() {
    $titre = $this->json->titre;
    $auteur = $this->json->auteur;
    return "$titre - $auteur";
  }

  private function meta_description() {
    if(strlen($this->json->description) < 200) return $this->json->description;

    $desc = substr($this->json->description, 0, strpos($this->json->description, ' ', 200)).'...';
    return $desc;
  }
}