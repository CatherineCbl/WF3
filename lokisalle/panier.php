<?php
require_once("inc/init.inc.php");
//------ TRAITEMENT PHP ------//
//------ AJOUTER PANIER ------//
if (isset($_POST['ajout_panier']))
{
    $resultat = executeRequete("SELECT s.titre, p.id_salle, p.prix
    FROM salle s, produit p
    WHERE s.id_salle = p.id_salle");


    $produit = $resultat->fetch_assoc();
    ajouterProduitDansPanier($produit['titre'],$produit['id_salle'],
    $produit['prix']);
}

//------- VIDER PANIER ---------//
if(isset($_GET['action']) && $_GET['action'] == 'vider')
{
    unset($_SESSION['panier']);
}

//-------------- PAIEMENT -------------//

if(isset($_POST['payer']))
{
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]);
        $produit = $resultat->fetch_assoc();


        executeRequete("INSERT INTO commande(id_membre, montant, date_enregistrement)VALUES(" . $_SESSION['membre']['id_membre'] . "," . montantTotal() . ", NOW())");
        $id_commande = $mysqli->insert_id;
        unset($_SESSION['panier']);
        mail($_SESSION['membre']['email'], "confirmation de la commande", "Merci, votre n° de suivi est le $id_commande", "From:catherine.cabeuil@gmail.com");
        $cpntenu .= "<div class='validation'>Merci pour votre commande. Votre numéro de suivi est le $id_commande</div>";
    }
}





//------------------- AFFICHAGE  HTML ----------------------//
require_once("inc/haut.inc.php");
echo $contenu;

echo "<table border='1' style='border-collapse:collapse;' cellpadding='7'>";
echo "<tr><td colspan='5'>Panier</td></tr>";
echo "<tr><th>Titre</th><th>Produit</th><th>Prix unitaire</th><th>Action</th></tr>";

if(empty($_SESSION['panier']['id_produit']))
{
    echo "<tr><td colspan='5'> Votre panier est vide</td></tr>";
}
else {
    for($i = 0; $i <count($_SESSION['panier']['id_produit']); $i++)
    {
        echo "<tr>";
        echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
        echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
        echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
        echo "<td></td>";
        echo "</tr>";
    }
    echo "<tr><th colspan='3'>Total</th><td colspan='2'>" . montantTotal() . "</td></tr>";
    if(internauteEstConnecte())
    {
        echo '<form method="post" action="">';
        echo '<tr><td colspan="5"><input type="submit" name="payer" value="valider et déclarer le paiement"</td></tr>';
        echo '</form>';
    }
    else
    {
        echo '<tr><td colspan="5">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir payer </td></tr>';
    }
    echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
}
echo "</table>";
echo "<i>Réglement par chèque uniquement à l'adresse suivante : 72 rue Jules Chatenay 93380 Pierrefitte-sur-Seine</i>";















require_once("inc/bas.inc.php");
?>
