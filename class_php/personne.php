<?php
class Personne{
    private $nom;
    private $prenom;
    private $adresse;

    public function __construct($newNom, $newPrenom, $adresse){
        $this->nom = $newNom;
        $this->prenom = $newPrenom;
        $this->setAdresse($adresse);
    }

    public function setAdresse($new_adresse){
        $this->adresse = $new_adresse;
    }

    public function getPersonne(){
        echo "Nom: ". $this->nom."<br>";
        echo "Prénom: ".$this->prenom."<br>";
        echo "Adresse: ".$this->adresse."<br>";
    }

    public function __destruct(){
        echo "Personne ". $this->prenom." supprimée.<br>";
    }


}
$catherine = new Personne("cabeuil", "catherine", "72 rue Jules Chatenay 93380 Pierrefitte");
$catherine->getPersonne();
