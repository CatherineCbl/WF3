CREATE DATABASE IF NOT EXISTS monsite;

USE monsite;

CREATE TABLE commande(
    id_commande INT(3) NOT NULL AUTO_INCREMENT,
    id_membre INT(3) DEFAULT NULL,
    montant INT(3) NOT NULL,
    date_enregistrement datetime NOT NULL,
    etat enum('en cours de traitement', 'envoyé', 'livré') NOT NULL,
    PRIMARY KEY(id_commande)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE details_commande(
    id_details_commande INT(3) NOT NULL AUTO_INCREMENT,
    id_commande INT(3) DEFAULT NULL,
    id_produit INT(3) DEFAULT NULL,
    quantite INT(3) NOT NULL,
    prix INT(3) NOT NULL,
    PRIMARY KEY(id_details_commande)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE membre(
    id_membre INT(3) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(20) NOT NULL,
    mdp VARCHAR(60) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(40) NOT NULL,
    civilite ENUM('m','f') NOT NULL,
    ville VARCHAR(20) NOT NULL,
    code_postal INT(5) unsigned zerofill NOT NULL,
    adresse VARCHAR(50) NOT NULL,
    statut INT(1) NOT NULL DEFAULT '0',
    PRIMARY KEY(id_membre),
    UNIQUE KEY pseudo (pseudo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE produit(
    id_produit INT(3) NOT NULL AUTO_INCREMENT,
    reference VARCHAR(20) NOT NULL,
    categorie VARCHAR(20) NOT NULL,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    couleur VARCHAR(20) NOT NULL,
    taille VARCHAR(5) NOT NULL,
    public ENUM('m', 'f', 'mixte') NOT NULL,
    photo VARCHAR(250) NOT NULL,
    prix INT(3) NOT NULL,
    stock INT(3) NOT NULL,
    PRIMARY KEY(id_produit),
    UNIQUE KEY reference (reference)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
