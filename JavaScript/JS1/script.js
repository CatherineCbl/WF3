

//exercice

var montant_ttc;
var montant_ht;
var montant_tva;
const TAUX_TVA = 20/100;

montant_ht = window.prompt('votre montant HT');
montant_ht = parseFloat(montant_ht);
montant_tva = TAUX_TVA*montant_ht
montant_ttc = montant_ht + montant_tva;

document.write("Pour un montant HT de " + montant_ht + " € il y a " + montant_tva + " € de TVA. Le montant TTC est donc de " + montant_ttc + " €.");
