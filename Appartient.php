<?php
/**
 *
 */
class Appartient
{
  private $idMembre;
  private $idGroupe;
  private $co;

  function __construct($membre, $groupe, $co)
  {
    $this->idMembre = $membre;
    $this->idGroupe = $groupe;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO appartient VALUES ('$membre', '$groupe')") or die ("Erreur lors de la création d'une appartenance membre-groupe");
  }

  //functions : supprimer un membre d'un groupe = une ligne entière 
}
 ?>
