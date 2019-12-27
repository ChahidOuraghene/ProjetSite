<?php

/**
 *  Création de la classe BD : prés-requis afin de se connecter à une Base de donnée
 */
class Bd
{
  private $user = "admin";
  private $host = "127.0.0.1";
  private $mdp = "admin";
  private $bdd;
  private $co;

  public function __construct($uneBD)
  {
    $this->bdd = $uneBD;
    $this->co = mysqli_connect($this->host, $this->user, $this->mdp, $this->bdd) or die("erreur de connection");
  }

  function connexion(){
    return $this->co;
  }

  function deconnexion(){
    mysqli_close($this->co) or die ("erreur lors de la connexion");
  }
}


 ?>
