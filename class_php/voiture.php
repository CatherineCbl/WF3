<?php

    class Vehicule{
        private $modele;
        private $marque;
        private $portes;
        private $annee;
        private $kilometrage = 0;
        public $couleur;

        public function creationVehicule($newModele, $newMarque, $newPortes, $newAnnee, $newCouleur){
            $this->modele = $newModele;
            $this->marque = $newMarque;
            $this->portes = $newPortes;
            $this->annee = $newAnnee;
            $this->couleur = $newCouleur;
        }

        public function avancer($distance){
            $this->kilometrage += $distance;//pareil que $this->kilometrage = distance + $this->kilometrage
        }

        public function reculer($distance){
            $this->kilometrage -= $distance;// ou $this->kilometrage = distance - $this->kilometrage
        }

        public function carteGrise(){
            echo "Modèle :".$this->modele."<br />";
            echo "Marque :".$this->marque."<br />";
            echo "Nombre de portes :".$this->portes."<br />";
            echo "Année de création :".$this->annee."<br />";
            echo "Couleur:".$this->couleur."<br />";
            echo "Kilométrage :".$this->kilometrage."<br />";
        }
    }

    $audiTT = new Vehicule();
    $audiTT->creationVehicule("TT", "Audi", 3, 2007, "Noir");
    $audiTT->avancer(200);
    $audiTT->carteGrise();

    echo "<br />";

    $renaultMegane = new Vehicule();
    $renaultMegane->creationVehicule("Mégane", "Renault", 5, 2005, "Bleue");
    $renaultMegane->avancer(200);
    $renaultMegane->carteGrise();
