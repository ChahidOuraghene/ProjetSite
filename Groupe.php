<?php

/**
 * Défini un groupe
 */
class Groupe
{
  private $idGroupe;
  private $libeleGroupe;
  private $adminGroupe;
  private $dateGroupe;
  private $idMembre;
  private $co;

  public function __construct($lib, $admin, $date, $co)
  {
    $this->libeleGroupe = $lib;
    $this->adminGroupe = $admin;
    $this->dateGroupe = $date;
    $this->co = $co;
    mysqli_query($co, "INSERT INTO groupe ('idGroupe', 'libeleGroupe', 'adminGroupe', 'dateGroupe')
                        VALUES ('', '$lib', '$admin', '$date')")
                        or die ("Erreur lors de la création d'un nouveau groupe");
    $this->idGroupe = mysqli_insert_id($co);
  }

  public function ajoutMembre($adrMail){
    $id  = mysqli_query($this->co, "SELECT idMembre FROM Membre WHERE adressMembre = '$adrMail'");
    $this->idMembre['$adrMail'] = $id;              //pas sur que ça marche                                                        //tableau associatif : retrouver l'id d'un membre appartenant à un groupe avec son mail
    mysqli_query($this->co, "INSERT INTO groupe (idMembre) VALUES ('$id')") or die ("Erreur lors de l'insertion d'un membre");
  }

  public function suppMembre($adrMail){
    $id  = mysqli_query($this->co, "SELECT idMembre FROM Membre WHERE adressMembre = '$adrMail'");
    unset($idMembre['$adrMail']);
  }

  public function setLibele($newLibele){
    $this->libeleGroupe = $newLibele ;
    $id = $this->idGroupe;
    mysqli_query($this->co, "UPDATE groupe SET libeleGroupe = '$newLibele' WHERE idGroupe = '$id'")
      or die ("Erreur lors de la modification du libele");
  }
  //fonctions : supprimer membre à terminer + connexion à une ssession et deconnexion
}











 ?>
