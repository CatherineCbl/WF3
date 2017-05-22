CREATE DATABASE IF NOT EXISTS lokisalle;

USE lokisalle;

CREATE TABLE salle(
    id_salle INT(3) NOT NULL AUTO_INCREMENT,
    titre VARCHAR(200),
    description TEXT,
    photo VARCHAR(200),
    pays VARCHAR(20),
    ville VARCHAR(20),
    adresse VARCHAR(50),
    cp INT(5),
    capacite INT(3),
    categorie enum('réunion', 'bureau', 'formation'),
    PRIMARY KEY(id_salle)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE produit(
    id_produit INT(3) AUTO_INCREMENT,
    id_salle INT(3),
    date_arrivee datetime,
    date_depart datetime,
    prix INT(3),
    categorie enum('libre', 'réservation'),
    PRIMARY KEY(id_produit)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE commande(
    id_commande INT(3) AUTO_INCREMENT,
    id_membre INT(3),
    id_produit INT(3),
    date_enregistrement datetime,
    PRIMARY KEY(id_commande)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE avis(
    id_avis INT(3) AUTO_INCREMENT,
    id_membre INT(3),
    id_salle INT(3),
    commentaire TEXT,
    note INT(2),
    date_enregistrement datetime,
    PRIMARY KEY(id_avis)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE membre(
    id_membre INT(3) AUTO_INCREMENT,
    pseudo VARCHAR(20),
    mdp VARCHAR(60),
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(50),
    civilite enum('m', 'f'),
    statut INT(1) NOT NULL DEFAULT '0',
    date_enregistrement datetime CURRENT_TIMESTAMP,
    PRIMARY KEY(id_membre)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;
