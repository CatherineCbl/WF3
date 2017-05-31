<?php
    class Animal{
        public $nom;

        public function deplacement($type){
            echo "Je suis un ".$this->nom.". Je me déplace en ".$type;
        }
        public function hurlement($cri){
            echo "Je suis un ".$this->nom.". Mon cri est le ".$cri;
        }
        public function
    }

    class Aigle extends Animal{
        public $type = "vol";
        public $cri = "glatissement";

    }
    class Lion extends Animal{
        public $type = "court";
        public $cri = "rugissement";
    }
    class Poisson extends Animal{
        public $type = "nage";

        public function respirerSousLeau(){
             echo "Je suis un ".$this->nom." et je respire sous l'eau.";
        }

    }


    $royal = new Aigle();
    $royal->nom = "Aigle Royal";
    $royal->deplacement($royal->type);
 ?>
