<?php

$tableau = array(
    "Prénom" => "Catherine",
    "Nom" => "Cabeuil",
    "Adresse" => "72 rue Jules Châtenay",
    "Code Postal" => "93380",
    "Ville" => "Pierrfitte-sur-Seine",
    "Email" => "catherine.cabeuil@lepoles.com",
    "Téléphone" => "0659029061",
    "Date de naissance" => '1994-04-11'
);

foreach ($tableau as $clé => $valeur) {
    echo "<ul>";
    echo"<li>";
    echo "$clé => $valeur";
    echo "</li>";
    echo"</ul>";

}
