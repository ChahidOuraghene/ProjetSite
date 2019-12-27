<?php
/**
 *
 */
class Proposition
{
  private $idProposition;
  private $descriptionCourte;
  private $descriptionDetaille;
  private $nbVotePour;
  private $nbVoteContre;
  private $dateCreationProposition;
  private $idMembre;
  private $co;

  public function __construct($court, $detaille, $date, $membre, $co)
  {
    $this->descriptionCourte = $court;
    $this->descriptionDetaille = $detaille;
    $this->nbVotePour = 0;
    $this->nbVoteContre = 0;
    $this->dateCreationProposition = $date;
    $this->idMembre = $membre;
    $this->idMembre = $membre;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO proposition VALUES ('', '$court', '$detaille', 0, 0, '$date', '$membre')")
      or die ("Erreur lors de la création d'une nouvelle proposition");
    $this->idProposition = mysqli_insert_id($co);
  }

  //function : supprimer une proposition 

  public function votePour(){
    $id = $this->idProposition;
    $this->nbVotePour += 1;

    mysqli_query($this->co, "UPDATE proposition SET nbVotePour += 1 WHERE idProposition = '$id'") or die ("Erreur lors de l'incrémentation du vote Pour");
  }

  public function voteContre(){
    $id = $this->idProposition;
    $this->nbVoteContre += 1;

    mysqli_query($this->co, "UPDATE proposition SET nbVoteContre += 1 WHERE idProposition = '$id'") or die ("Erreur lors de l'incrémentation du vote Contre");








  }
}
 ?>
