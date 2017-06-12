<?php

    class Chat{
        private $prenom;
        private $age;
        private $couleur;
        private $sexe;
        private $race;

        public function __construct($new_prenom, $new_age, $new_couleur, $new_sexe, $new_race){
            //traitements des erreurs
            $error = "<h1>";

            if(strlen($new_prenom) <= 20 && strlen($new_prenom) > 3)
                $this->prenom = $new_prenom;
            else
                $error .= " Prénom (".$new_prenom.") du chat non conforme! <br/>";


            if (is_int($new_age))
                $this->age = $new_age;
            else
                $error .= " Âge (".$new_age.") du chat non conforme! <br/>";


            if(strlen($new_couleur) <= 10 && strlen($new_couleur) > 3)
                $this->couleur = $new_couleur;
            else
                $error .= "Couleur (".$new_couleur.") du chat non conforme! <br/>";


            if ($new_sexe == "male" || $new_sexe == "femelle")
                $this->sexe = $new_sexe;
             else
                $error .= "Sexe (".$new_sexe.") du chat non conforme! <br/>";


            if(strlen($new_race) <= 20 && strlen($new_race) > 3)
                $this->race = $new_race;
            else
                $error .= "Race (".$new_race.") du chat non conforme! <br/>";



            echo $error."</h1>";
        }

        //SETTER pour modifier les informations
        public function setPrenom($new_prenom){
            $this->prenom = $new_prenom;
        }
        public function setAge($new_age){
            $this->age = $new_age;
        }
        public function setCouleur($new_couleur){
            $this->couleur = $new_couleur;
        }
        public function setSexe($new_sexe){
            $this->sexe = $new_sexe;
        }
        public function setRace($new_race){
            $this->race = $new_race;
        }

        // GETTER pour afficher les informations
        public function getPrenom(){
            return $this->prenom;
        }
        public function getAge(){
            return $this->age;
        }
        public function getCouleur(){
            return $this->couleur;
        }
        public function getSexe(){
            return $this->sexe;
        }
        public function getRace(){
            return $this->race;
        }

        // méthode getInfos() permettant de retourner les propriétés sous forme de tableau
        public function getInfos(){
            echo "<table border='1' cellpading='5' style= 'border-collapse: collapse;'>";
            echo "<tr>";
            echo "<td>Prénom</td>";
            echo "<td>Âge</td>";
            echo "<td>Couleur</td>";
            echo "<td>Sexe</td>";
            echo "<td>Race</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$this->getPrenom()."</td>";
            echo "<td>".$this->getAge()."</td>";
            echo "<td>".$this->getCouleur()."</td>";
            echo "<td>".$this->getSexe()."</td>";
            echo "<td>".$this->getRace()."</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";
        }
    }
