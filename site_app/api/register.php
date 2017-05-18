<?php
    // echo "Mike ";

    class Personne{
        // attributs en dehors de la fonction car on en aura besoin dans d'autres fonctions s'ils étaient dans la fonction il n'existerait plus une fois qu'on est en dehors de la fonction
        public $nom = "";
        public $prenom = "";
        public $poste = "";

        function __construct($nom, $prenom){
            $this->nom = $nom;
            $this->prenom = $prenom;
        }

        public function emploi($sonEmploi){
            $this->poste = $sonEmploi;
        }
    }
    $Lakhdar = new Personne("Fahim", "Lakhdar");
    echo $Lakhdar->nom;

    $Sylvestre = new Personne("Sylvestre", "Mike Christopher");
    echo $Sylvestre->nom;

    $Lakhdar->emploi("O-Tacos");
    echo $Lakhdar->poste;
?>
