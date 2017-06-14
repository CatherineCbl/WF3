<?php
namespace Model\Db;
use ORM;
/*
*Le fait de déclarer des propriétés ou des méthodes comme
*statiques vous permet d'y acceder sans avoir besoin d'instancier
*la classe. On ne peut accéder à une propriété déclarée comme statique
*avec l'objet instancié d'une classe (bien que ce soit possible pour une méthode statique)
*Docs : https://php.net/manual/fr/language.oop5.static.php
*/

class DbFactory{
    public static function start() {
        #Récupération des données de l'App
        $app = getApp();

        #Initialisation de Idiorm
        ORM::configure('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'));
        ORM::configure('username', $app->getConfig('db_user'));
        ORM::configure('password', $app->getConfig('db_pass'));
    }
}
