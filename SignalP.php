<?php
/**
 *
 */
class SignalP
{
  private $idProposition;
  private $idMembre;
  private $libeleSignalP;
  private $co;

  function __construct($prop, $membre, $libele, $co)
  {
    $this->idProposition = $prop;
    $this->idMembre = $membre;
    $this->libeleSignalP = $libele;
    $this->co = $co;

    mysqli_query($co, "INSERT INTO signalP VALUES ('$prop', '$membre', '$libele')") or die ("Erreur lors de la création d'un nouveau signalP");
  }

  //Aucune fonctions 
}
 ?>
