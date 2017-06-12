<?php
    class Crud{//Class = Object - eLle commence toujours par une majuscule
        /*
        **propriétés = variables - toujours en minuscules et séparée si besoin par des underscores (ex: public $donne_a_enregistrer)
        **public => Utilisable dans la class et par les instances.
        **private=>Utilisable uniquement dans la class les instances n'y ont pas accès
        */
        private $host;
        private $user;
        private $password;
        private $database;
        private $mysqli;
        public $table;

        //le "__construct" est automatiquement appelé lors de la création d'une nouvelle instance
        public function __construct($newHost, $newUser, $newPassword, $newDatabase){// Méthode = fonction - Toujours en minuscule et camelcase pour séparer si besoin (ex: public function allerAuParc(){} )
            $this->host = $newHost;
            $this->user = $newUser;
            $this->password = $newPassword;
            $this->database = $newDatabase;
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        public function create($champs, $newTable){
            // INSERT
            $insert = ""; // init variable select
            foreach($champs as $indice => $value){ // Boucle sur l'array
                $insert .= $indice.", "; // Concatenation de la chaine de caractere $select avec ', '
            }
            $insert = rtrim($insert, ", "); // Suppression du dernier ', '

            //VALEUR
            $data = "";
            foreach ($champs as $key => $value) {
                $data .= "'" . $value . "', ";
            }
            $data = rtrim($data, ", ");
            $result = $this->mysqli->query("INSERT INTO ".$newTable." (".$insert.") VALUES (".$data.")"); // Execution de la requet

        }

        public function read($champs, $newTable, $condition){
            // SELECT
            $select = ""; // init variable select
            foreach($champs as $indice){ // Boucle sur l'array
                $select .= $indice.", "; // Concatenation de la chaine de caractere $select avec ', '
            }
            $select = rtrim($select, ", "); // Suppression du dernier ', '

            // WHERE
            $where = ""; // init variable where
            foreach($condition as $key => $value){ // Boucle sur l'array afin de récupérer le champs($key) et la valeu associer ($valeu)
                $where .= $key." = '".$value."' AND "; // Concatenation de la chaine de caractere $where avec ' = ' Et a la fin le 'AND'
            }
            $where = rtrim($where, " AND "); // Suppression du dernier ' AND '

            $result = $this->mysqli->query("SELECT ".$select." FROM ".$newTable." WHERE ".$where); // Execution de la requet
            $tableau = $result->fetch_all(MYSQLI_ASSOC); // Trie des données par association
            return $tableau; // Retour des données
        }


        public function update($champs, $newTable, $condition){
            //VALEUR
            $set = "";
            foreach ($condition as $key => $value) {
                $set .= "'" . $value . "', ";
            }
            $set = rtrim($set, ", ");

            // WHERE
            $where = ""; // init variable where
            foreach($condition as $key => $value){ // Boucle sur l'array afin de récupérer le champs($key) et la valeu associer ($valeu)
                $where .= $key." = '".$value."' AND "; // Concatenation de la chaine de caractere $where avec ' = ' Et a la fin le 'AND'
            }
            $where = rtrim($where, " AND "); // Suppression du dernier ' AND '

            $result = $this->mysqli->query("UPDATE ".$newTable." SET ".$set." WHERE ".$where); // Execution de la requete
        }


        public function delete($newTable, $condition){
            $where = ""; // init variable where
            foreach($condition as $key => $value){ // Boucle sur l'array afin de récupérer le champs($key) et la valeur associer ($value)
                $where .= $key." = '".$value."' AND "; // Concatenation de la chaine de caractere $where avec ' = ' Et a la fin le 'AND'
            }

            $where = rtrim($where, " AND "); // Suppression du dernier ' AND '
            $result = $this->mysqli->query("DELETE FROM ".$newTable." WHERE ".$where); // Execution de la requete
        }

        //Le "__destruct" est automatiquement appelé à la fin du code
        function __destruct(){
            $this->mysqli->close();
        }
    }

/*
**Instances = new de la Class (Nous affectons les variables et les fonctions public à notre variables)
** Pour faire appelle à une variable ou une fonction, nous "Aiguillons" grâce à une "->" vers la ressource(les variables et les fonctions)
*/
    // $mydb = new Crud("localhost", "root", "", "projetapp");
    // $data = array("name"=>"politics", "slug"=>"politics", "image"=>"test.jpg");
    // $mydb->create($data, "category");
