<?php
/**
 * Définition d'une categorie
 */
class Categorie
{
  private $idCategorie;
  private $nomCategorie;
  private $categoriePrimaire;
  private $categorieSecondaire;
  private $idGroupe;
  private $co;

  public function __construct($nom, $categorie, $groupe, $co)
  {
    $this->nomCategorie = $nom;

    if ($categorie == 1) {                                                  //Si la categorie sélectionné par l'utilisateur est primaire alors on met 1 en parametre lors de la création pour spécifier le type de categorie
      $this->categoriePrimaire = TRUE;
      $this->categorieSecondaire = FALSE;
    }
    else{                                                                  //sinon on passe 0 si la categorie est secondaire
      $this->categoriePrimaire = FALSE;
      $this->categorieSecondaire = TRUE;
    }

    $this->idGroupe = $groupe;                                                       //JSP COMMENT ON RECUPERE CET ID MAIS ON LE RECUPERE FREROT

    $this->co = $co;
    mysqli_query($co, "INSERT INTO categorie VALUES ('','$nom', '$this->categoriePrimaire', '$this->categorieSecondaire', '$groupe')")
    or die ("Erreur lors de l'insertion d'une nouvelle categorie");
    $this->idCategorie = mysqli_insert_id($co);
  }


  //On ne peut pas changer le nom d'une categorie sinon des gens se retrouveraient à avoir écrit des propositions dans des categories qu'ils n'ont pas choisi (ne sont pas consentant)
  //Par contre on peut changer le type de categorie
  public function setCategorie(){                                                     //La fonction permettra d'inverser le type de categorie
    $id = $this->idCategorie;

    if ($this->categoriePrimaire == true){
      $this->categoriePrimaire = false;
      $this->categorieSecondaire = true;

      mysqli_query($this->co, "UPDATE groupe SET categoriePrimaire = 'false', categorieSecondaire = 'true' WHERE idCategorie = '$id'")
      or die ("Erreur lors de l'échange des categories");
    }
    else {
      $this->categoriePrimaire = true;
      $this->categorieSecondaire = false;

      mysqli_query($this->co, "UPDATE groupe SET categoriePrimaire = 'true', categorieSecondaire = 'false' WHERE idCategorie = '$id'")
      or die ("Erreur lors de l'échange des categories");
    }
  }


}











 ?>
