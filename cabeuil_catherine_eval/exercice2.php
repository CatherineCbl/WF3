<?php
function calcul($montant, $devise)
{
    switch ($devise) {
        case 'EUR':
            $resultat=round(($montant*1.085965),2);
            return $montant . " € font " . $resultat . " dollars américains. ";
            break;
        case 'USD':
        $resultat=round(($montant*0.920839),2);
        return $montant . " dollars americains font " . $resultat . " €. ";
            break;
    }

}
//echo calcul(2, 'USD'). "<br>";
 ?>
