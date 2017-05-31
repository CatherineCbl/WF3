<?php

    class Entreprise{
        private $nom;
        private $logo;
        private $rue;
        private $code_postal;
        private $ville;
        private $taille;
        private $date_creation;

        public function __construct($new_nom, $new_logo, $new_rue, $new_code_postal, $new_ville, $new_taille, $new_date_creation){
            $error = "<h1>";

            if(strlen($new_nom) <= 20 && strlen($new_nom) > 1)
                $this->nom = $new_nom;
            else
                $error .= "Votre nom (".$new_nom.") n'est pas conforme! <br/>";
            if(strlen($new_logo) <= 255 && strlen($new_logo) > 1)
                $this->logo = $new_logo;
            else
                $error .= "Votre logo (".$new_logo.") n'est pas conforme! <br/>";
            if(strlen($new_rue) <= 150 && strlen($new_rue) > 1)
                $this->rue = $new_rue;
            else
                $error .= "Votre rue (".$new_rue.") n'est pas conforme! <br/>";
            if(strlen($new_code_postal) <= 5 && strlen($new_code_postal) > 1)
                $this->code_postal = $new_code_postal;
            else
                $error .= "Votre code postal (".$new_code_postal.") n'est pas conforme! <br/>";
            if(strlen($new_ville) <= 50 && strlen($new_ville) > 1)
                $this->ville = $new_ville;
            else
                $error .= "Votre ville (".$new_ville.") n'est pas conforme! <br/>";
            if(strlen($new_taille) <= 5 && strlen($new_taille) > 1)
                $this->taille = $new_taille;
            else
                $error .= "Votre taille (".$new_taille.") n'est pas conforme! <br/>";
            if(strlen($new_date_creation) <= 4 && strlen($new_date_creation) > 1)
                $this->date_creation = $new_date_creation;
            else
                $error .= "Votre date de création (".$new_date_creation.") n'est pas conforme! <br/>";



            echo $error."</h1>";
        }

        //SETTER => modifier
        public function setNom($new_nom){
            $this->nom = $new_nom;
        }
        public function setLogo($new_logo){
            $this->logo = $new_logo;
        }
        public function setRue($new_rue){
            $this->rue = $new_rue;
        }
        public function setCodePostal($new_code_postal){
            $this->code_postal = $new_code_postal;
        }
        public function setVille($new_ville){
            $this->ville = $new_ville;
        }
        public function setTaille($new_taille){
            $this->taille = $new_taille;
        }
        public function setDateCreation($new_date_creation){
            $this->date_creation = $new_date_creation;
        }

        // GETTER => afficher
        public function getNom(){
            echo $this->nom;
        }
        public function getLogo(){
            echo "Logo: ". $this->logo."<br />";
        }
        public function getRue(){
            echo "Rue : ".$this->rue."<br />";
        }
        public function getCodePostal(){
            echo "Code postal : ".$this->code_postal."<br />";
        }
        public function getVille(){
            echo "Ville : ".$this->ville."<br />";
        }
        public function getTaille(){
            echo "Taille : ".$this->taille."<br />";
            return $this->taille;
        }
        public function getDateCreation(){
            echo "Date de création : ".$this->date_creation."<br /><br />";
            return $this->date_creation;
        }


        public function ficheSociete(){
            echo "Nom : ";
            echo $this->getNom()."<br />";
            $this->getLogo();
            $this->getRue();
            $this->getCodePostal();
            $this->getVille();
            $this->getTaille();
            $this->getDateCreation();
        }


        public function comparaison($societe2){
            if ($this->taille > $societe2->taille) {
                echo $this->getNom()." présente plus d'employés que ";
                echo $societe2->getNom().".<br/>";
            }
            elseif ($this->taille = $societe2->taille) {
                echo $this->getNom()." et ";
                echo $societe2->getNom()." présentent le même nombre d'employés.<br/>";
            }
            else {
                echo $societe2->getNom()." présente plus d'employés que ";
                echo $this->getNom().".<br/>";
            }
            if ($this->date_creation > $societe2->date_creation) {
                echo $societe2->getNom()." a été créée avant ";
                echo $this->getNom().".<br/>";
            }
            elseif ($this->date_creation = $societe2->date_creation) {
                echo $societe2->getNom()." et ";
                echo $this->getNom()." ont été créés la même année.<br/>";
            }
            else {
                echo $this->getNom()." a été créée avant ";
                echo $societe2->getNom().".<br/>";
            }
        }
    }

    $microsoft = new entreprise("Microsoft", "gertyrz", "gefgertr", "93380", "fretrzetz", 45, 1968);
    $apple= new entreprise("Apple", "trztztrzectr", "tcrtttc", "93380", "fretrzetz", 58, 1968);

    $microsoft->ficheSociete();
    echo "<br />";
    $apple->ficheSociete();
    $apple->comparaison($microsoft);
