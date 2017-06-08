<?php
    class Voiture{ // Class = Objet

        /*
            public = TOUT les monde peut l'utiliser (Class, Heritage & Instance)
            private = Uniquement la class qui a accès (ex: class Voiture)
        */
        private $nbPorte;
        private $marque;
        private $modele;
        private $annee;
        private $nbPlace;
        public $couleur;

        //Variable GLOBAL//
        private $mysqli;

        public function __construct(){ // Lancement a la création de l'instance
            $this->mysqli = new mysqli("localhost", "root", "", "voiture"); // new = Instance -> Recuperer tout les variables et les fonctions public de la class pour les mettre dans une variable.
        }

        public function enregistrer($nombrePorte, $laMarque, $leModele, $lAnnee, $nombrePlace, $laCouleur){
            $this->mysqli->query("INSERT INTO `vehicule`(`nb_porte`, `marque`, `modele`, `annee`, `nb_place`, `couleur`) VALUES ('$nombrePorte', '$laMarque', '$leModele', '$lAnnee', '$nombrePlace', '$laCouleur')");
        }

        public function lecture(){
            $listeVehivule = $this->mysqli->query("SELECT * FROM vehicule");
            $tableauVehicule = $listeVehicule->fetch_all(MYSQLI_ASSOC);
            var_dump($tableauVehicule);
        }

        public function supprimer($id){
            $this->mysqli->query("DELETE FROM vehicule WHERE id = $id");
        }

    }
    $vehicule = new Voiture();
    $vehicule->enregistrer($_POST["nb_porte"], $_POST["marque"], $_POST["modele"], $_POST["annee"], $_POST["nb_place"], $_POST["couleur"]);
    // $vehicule->supprimer(3);
    // $vehicule->lecture();
