<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lokisalle</title>
        <link rel="stylesheet" href="/github/WF3/mon_site/inc/css/style.css">
    </head>
    <body>
        <header>
            <div class="conteneur">
                <span>
                    <a href="" title="Mon Site">Lokisalle.com</a>
                </span>
                <nav>
                    <?php
                    if (internauteEstConnecteEtEstAdmin()) {
                        echo '<a href="' . URL . 'admin/gestion_membre.php">Gestion des membres</a>';
                        echo '<a href="' . URL . 'admin/gestion_commande.php">Gestion des commandes</a>';
                        echo '<a href="' . URL . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
                    }

                    if (internauteEstConnecte()) {// if et non elseif afin que cette condition s'applique aux membres et aux admin
                        echo '<a href="' . URL . 'profil.php">Voir votre profil</a>';
                        echo '<a href="' . URL . 'boutique.php">Accès à la boutique</a>';
                        echo '<a href="' . URL . 'panier.php">Voir votre panier</a>';
                        echo '<a href="' . URL . 'connexion.php?action=deconnexion">Se déconnecter</a>';
                    }
                    else {
                        echo '<a href="' . URL . 'inscription.php">Inscription</a>';
                        echo '<a href="' . URL . 'connexion.php">Connexion</a>';
                        echo '<a href="' . URL . 'boutique.php">Accès à la boutique</a>';
                        echo '<a href="' . URL . 'panier.php">Voir votre panier</a>';
                    }
                    //visiteur = 4 liens
                    //membre = 4 liens
                    //admin = 7 liens
                     ?>
                </nav>
            </div>
        </header>
        <section>
            <div class="conteneur">
