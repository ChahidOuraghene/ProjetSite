<?php
/**
 *
 */
class Commentaire
{
  private $idCommentaire;
  private $descriptionCommentaire;
  private $auteurCommentaire;
  private $signalCommentaire;
  private $nbSignal;
  private $dateCreationCommentaire;
  private $idMembre;
  private $idProposition;
  private $co;

  public function __construct($description, $auteur, $date, $membre, $proposition, $co)
  {
    $this->descriptionCommentaire = $description;
    $this->auteurCommentaire = $auteur;
    $this->signalCommentaire = false;
    $this->nbSignal = 0;
    $this->dateCreationCommentaire = $date;
    $this->idMembre = $membre;
    $this->idProposition = $proposition;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO proposition VALUES ('', '$description', '$auteur', 'false', '$date', '$membre', '$proposition')")
      or die ("Erreur lors de la création d'un nouveau commentaire");
    $this->idCommentaire = mysqli_insert_id($co);
  }

  //fonctions :

  public function setSignal(){
    $id = $this->idCommentaire;
    $this->signalCommentaire = 'true';
    $this->nbSignal += 1;

    mysqli_query($this->co, "UPDATE commentaire SET signalCommentaire = 'true' WHERE idCommentaire = '$id'") or die ("Erreur lors du signalement du commentaire");
  }
}
 ?>
