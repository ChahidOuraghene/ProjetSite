<?php

/**
 * Définit un membre de la plateforme
 */
class Membre
{
  private $idMembre;
  private $adressMembre;
  private $mdpMembre;
  private $nomMembre;
  private $prenomMembre;
  private $ageMembre;
  private $dateNaissanceMembre;
  private $dateCreationMembre;
  private $nbCommSig;
  private $nbPropSig;
  private $co;

  public function __construct($adrMail, $mdp, $nom, $prenom, $dateNaissance, $dateCreation, $co)
  {
    $this->adressMembre = $adrMail;
    $this->mdpMembre = $mdp;
    $this->nomMembre = $nom;
    $this->prenomMembre = $prenom;
    $this->dateNaissanceMembre = $dateNaissance;
    $this->ageMembre = $this->calculAge();                                                          //calcul automatique de l'âge grâce à la fonction static
    $this->dateCrationMembre = $dateCreation;
    $this->nbCommSig = 0;
    $this->nbPropSig = 0;
    $this->co = $co;
    mysqli_query($co, "INSERT INTO Membre VALUES
      ('','$adrMail','$mdp','$nom','$prenom','$age','$dateNaissance','$this->dateCreationMembre',0,0)")                               //Insertion du nouveau membre dans la BD
      or die ("erreur lors de la création d'un nouveau membre");
    $this->idMembre = mysqli_insert_id($co);                                                                                          //On stock l'id du membre récupéré après son insertion
  }

  public function seConnecte(){
    session_start();
    $_SESSION['id'] = $this->idMembre;
    $_SESSION['adrMail'] = $this->adressMembre;
  }

  public function seDeconnecte(){
    session_destroy();
    mysqli_close($this->co);
  }

  public function setMdpMembre($mdepasse) {
    $id = $this->idMembre;
    $this->mdpMembre = $mdepasse;
    mysqli_query($this->co, "UPDATE membre SET mdpMembre='$mdepasse' WHERE idMembre ='$id'") or die ("erreur lors de la modification du mot de passe");
  }

  public function setAdressMembre($mail) {
    $id = $this->idMembre;
    $this->adressMembre = $mail;
    mysqli_query($this->co, "UPDATE membre SET adressMembre='$mail' WHERE idMembre ='$id'") or die ("erreur lors de la modification de l'adresse mail");
  }

  public static function calculAge(){
    $dateJ = date("m/d/Y");
    $dateN = $this->dateNaissanceMembre;

    $a = explode('/', $dateJ);                                            //scinder la date en un tableau
    $b = explode('/', $dateN);
    $age = $a[2] - $b[2];                                                 //Année courante - année de naissance

    if ($a[1] < $b[1]){                                                   //Si le mois courant est plus petit que le mois de naissance
      $age -= 1;                                                          //On a pas encore l'age (notre anniversaire n'est pas passé)
    }

    if ($a[1] = $b[1]){                                                   //Si les mois sont les mêmes
      if ($a[0] < $b[0]){                                                 //On regarde si le jour courant est inférieur au jour de naissance
        $age -= 1;                                                        //Dans ce cas là on a toujours pas l'âge
      }
    }
    return $age;
  }

  public function setNbCommSig(){
    $this->nbCommSig += 1;                                                  //Incrémente de 1 lorsqu'un commentaire du membre est signalé
    $id = $this->idMembre;
    mysqli_query($this->co, "UPDATE membre SET nbCommSig +=1 WHERE idMembre ='$id'") or die ("erreur lors de la mise à jour du nombre de signals pour les commentaires d'un membre");
  }

  public function setNbPropSig(){
    $this->nbPropSig += 1;                                                  ////Incrémente de 1 lorsqu'une proposition du membre est signalée
    $id = $this->idMembre;
    mysqli_query($this->co, "UPDATE membre SET nbPropSig +=1 WHERE idMembre ='$id'") or die ("erreur lors de la mise à jour du nombre de signals pour les propositions d'un membre");

  }
}
 ?>
