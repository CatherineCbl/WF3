CREATE DATABASE IF NOT EXISTS boutique;

USE boutique;

CREATE TABLE produits(
    id_produit INT(3) NOT NULL AUTO_INCREMENT,
    reference VARCHAR(8) NOT NULL,
    categorie VARCHAR(15) NOT NULL,
    titre VARCHAR(15) NOT NULL,
    description VARCHAR(150) NOT NULL,
    couleur VARCHAR(10) NOT NULL,
    taille VARCHAR(10) NOT NULL,
    prix INT(3) NOT NULL,
    stock INT(3) DEFAULT NULL,
    PRIMARY KEY(id_produit)
)ENGINE=InnoDB;
