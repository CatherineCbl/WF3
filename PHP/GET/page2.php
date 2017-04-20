<?php
echo $_GET['article'] ."<br>";
echo $_GET['couleur']."<br>";
echo $_GET['prix']."<br>";
echo "<hr>";
// faire la même chose via boucle foreach
foreach($_GET as $indices => $valeur)
{
    echo $indices . " : " . $valeur . '<br>';
}
