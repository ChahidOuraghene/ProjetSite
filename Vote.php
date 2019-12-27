<?php
/**
 *
 */
class Vote
{
  private $idProposition;
  private $idMembre;
  private $dateCreationVote;
  private $dateCloture;
  private $type;
  private $co;

  public function __construct($proposition, $membre, $dateCre, $dateClo, $type,$co)
  {
    $this->idProposition = $proposition;
    $this->idMembre = $membre;
    $this->dateCreationVote = $dateCre;
    $this->dateCloture = $dateClo;
    $this->type = $type;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO vote VALUES ('$proposition', '$membre', '$dateCre', '$dateClo', '$type')") or die ("Erreur lors de la création d'un nouveau vote");
  }

  //function : ajouter une date de cloture/ Changer le type de vote -> est ce que je met une cloture dans le constructeur ou pas

  public function ajoutDateCloture($date){

  }
}
 ?>
