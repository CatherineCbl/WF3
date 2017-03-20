var date_du_jour = new Date();
var jour = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
var mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']

document.write("Nous sommes le " + jour[date_du_jour.getDay()] + date_du_jour.getDate() + mois[date_du_jour.getMonth()] + date_du_jour.getFullYear())
