<?php

class Ville{
    private $nom;
    private $departement;

    public function __construct($nom, $departement){
        $this->setNom($nom);
        $this->setDepartement($departement);
    }


    public function setNom($new_nom){
        $this->nom = $new_nom;
    }
    public function setDepartement($new_departement){
        $this->departement = $new_departement;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getDepartement(){
        return $this->departement;
    }

    public function gps(){
        echo "La ville ".$this->getNom()." est dans le département ".$this->getDepartement().".<br>";
    }
}

$sarcelles = new Ville("Sarcelles", 95);
$boulogne = new Ville("Boulogne", 92);
$pierrefitte = new Ville("Pierrefitte", 93);

$sarcelles->gps();
$boulogne->gps();
$pierrefitte->gps();
