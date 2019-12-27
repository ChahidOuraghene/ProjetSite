<?php
/**
 *
 */
class Associe
{
  private $idProposition;
  private $idCategorie;
  private $co;

  public function __construct($prop, $categorie, $co)
  {
    $this->idProposition = $prop;
    $this->idCategorie = $categorie;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO associe VALUES ('$prop', '$categorie')") or die ("Erreur lors de la création d'une association proposition-categorie");
  }

  //function : change categorie
}
 ?>
