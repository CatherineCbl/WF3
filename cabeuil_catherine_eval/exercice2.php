<?php
//déclaration de la fonction conversion()
function conversion($montant, $devise)
{
    switch ($devise) {
        case 'usd':
            $resultat=round($montant*1.108679,2);
            break;
        case 'euro':
        $resultat=round($montant*0.891321,2);
            break;
    }

}
//Traitements si le bouton convertir est cliqué
if(isset($_POST['conversion'])){
    if (!empty($_POST['montant'])) {
        if (is_numeric($_POST['montant'])) {
            if ($_POST['devise'] == 'usd' || $_POST['devise'] == 'euro') {
                $somme_convertie = conversion($_POST['montant'], $_POST['devise']);
                if ($_POST['devise'] == 'euro') {
                    echo $_POST['montant'].' € est égal à '.$somme_convertie.'$';
                }
                else {
                    echo $_POST['montant'].' $ est égal à '.$somme_convertie.'€';
                }
            }
            else {
                echo '<p style="background:red; color:white; padding:5px"> Seules les conversions euros/dollars ou dollars/euros sont disponibles!</p>';
            }
        }
        else {
            echo '<p style="background:red; color:white; padding:5px"> Veuillez renseigner une somme valide!</p>';
        }
    }
    else{
        echo '<p style="background:red; color:white; padding:5px"> Veuillez renseigner une somme à convertir!</p>';
    }
}

//echo calcul(2, 'USD'). "<br>";
 ?>
 <!--CORRECTION ET SUPPLEMENTS...-->

<form action="" method="post">
    <input type="text" name="montant" placeholder="Somme à convertir" />
    <select name="devise">
        <option value="usd">EUR->USD</option>
        <option value="euro">USD->EUR</option>
    </select>
    <input type="submit" name="conversion" value="Convertir" />
</form>
