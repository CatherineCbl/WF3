<?php

    class vehicule{
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
    }

    $audiTT = new vehicule();
    $audiTT->creationVehicule("TT", "Audi", 3, 2007, "Noir");
