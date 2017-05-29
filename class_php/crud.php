<?php
    class Crud{

        private $host;
        private $user;
        private $password;
        private $database;
        private $mysqli;
        public $table;

        public function connect($newHost, $newUser, $newPassword, $newDatabase){
            $this->host = $newHost;
            $this->user = $newUser;
            $this->password = $newPassword;
            $this->database = $newDatabase;
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        }

        public function create($champs, $newTable){
            // INSERT
            $insert = ""; // init variable select
            foreach($champs as $indice){ // Boucle sur l'array
                $insert .= $indice.", "; // Concatenation de la chaine de caractere $select avec ', '
            }
            $insert = rtrim($select, ", "); // Suppression du dernier ', '

            //VALEUR
            $data = "";
            foreach ($condition as $key => $value) {
                $data .= "'" . $value . "', ";
            }
            $data = rtrim($data, ", ");
            $result = $this->mysqli->query("INSERT INTO (".$newTable.") VALUES (".$data.")"); // Execution de la requet

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
            foreach($condition as $key => $value){ // Boucle sur l'array afin de récupérer le champs($key) et la valeu associer ($value)
                $where .= $key." = '".$value."' AND "; // Concatenation de la chaine de caractere $where avec ' = ' Et a la fin le 'AND'
            }

            $where = rtrim($where, " AND "); // Suppression du dernier ' AND '
            $result = $this->mysqli->query("DELETE FROM ".$newTable." WHERE ".$where); // Execution de la requete
            $tableau = $result->fetch_all(MYSQLI_ASSOC); // Trie des données par association
        }
    }

    $test = new Crud();
    $test->connect("localhost", "root", "", "entreprise");
    $leTableau = $test->delete("employes", array("nom"=>"Gallet"));
    $leTableau = $test->read(array("nom", "prenom"), "employes", array("nom"=>"Gallet"));
    var_dump($leTableau);
