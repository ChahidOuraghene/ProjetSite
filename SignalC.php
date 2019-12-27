<?php
/**
 *
 */
class SignalC
{
  private $idMembre;
  private $idCommentaire;
  private $libeleSignalC;
  private $co;

  function __construct($membre, $comm, $libele, $co)
  {
    $this->idMembre = $membre;
    $this->idCommentaire = $comm;
    $this->libeleSignalC = $libele;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO signalC VALUES ('$membre', '$comm', '$libele')") or die ("Erreur lors de la création d'un nouveau signalC");
  }

  //Aucune fonctions 
}
 ?>
