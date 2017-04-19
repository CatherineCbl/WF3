<style>
h2{margin: 0; font-size: 20px; color: red;}
td{border: 1px solid #000;}
table{border-collapse: collapse; width: 20em;}
</style>
<h2>Ecritures et affichage</h2><!-- Nous pouvons écrire dut HTML dans un fichier ayant l'extension PHP l'inverse n'est pas possible -->
<?php
echo 'Bonjour'; //echo est une instruction d'affichage, nous pouvons le traduire par "affiche moi"
echo '<br>'; //Nous pouvons également y mettre du HTML
echo 'Bienvenue'; //si vous vous rendez dans le code-source, vous ne verrez pas le PHP car le langage est interprété.

echo '<hr><h2> Commentaires </h2>'
?>
<strong>Bonjour</strong><!-- nous voyons qu'il est également possible de fermer et ré-ouvrir php pour mélanger du code PHP&HTML -->
<?php
echo '<br>';
echo 'Texte'; //ceci est un commentaire sur une seule ligne
echo 'Texte';/* ceci est un commentaire
sur plusieurs lignes*/
echo '<br>';
print 'Nous sommes mardi'; //print est une autre instruction d'affichage. µIl n'y a pas de différence avec "echo"

//------------------------------------------------------------------------------

echo '<hr><h2>Variables : types / déclaration / affectation</h2>';
// une variable est un espace nommé permettant de conserver une valeur
// déclaration d'une variable toujour avec le signe $ suivi de son nom
// jamais d'accentet d'espace et jamais de chiffre après le signe $.
//$2a -> mauvaise syntaxe - $a2 -> bonne syntaxe
// c'est nous qui définissons le nom de la variable
$a = 127;// affectation de la valeur127 dans la variable nommée "a"
echo gettype($a); // gettype est une foction prédéfinie nous permettant de voir le type d'une variable. S'il s'agit d'un entier : ineteger.
echo '<br>';
$b = 1.5;
echo gettype($b);// un nombre à virgule : double
echo '<br>';
$c = 'Une chaine';
echo gettype($c);//là non plus nous ne regardons pas le contenu d'une variable mais son type : string
echo '<br>';
$d = '127';
echo gettype($d);// string;  entre quote l'interpreteur traduit que c'est une chaine de caractères
echo '<br>';
$e = true;
echo gettype($e);//boolean
echo '<br>';
$f = false;
echo gettype($f);//boolean

echo '<hr><h2> Concaténation </h2>';
$x = 'Bonjour ';
$y = 'tout le monde';
echo $x . $y.'<br>';// Point de concaténation que l'on peut traduire par "suivi de"
echo "$x $y <br>";//même chose sans concténation, entre guillemets les variable sosnt évaluées
echo 'Hey !'. $x .$y;// Concaténation texte et Variables
echo '<br>', 'coucou', '<br>'; // concaténation avec une virgule (la virgulr et le point de concaténation sont similaires)
//------------------------------------------------------------------------------

echo '<hr><h2> Concaténation lors de l\'affectation </h2>';
$prenom1 = 'Bruno';// affectation de la valeur "Bruno" sur la variable $prenom1"
$prenom1 = 'Claire';// affectation de la valeur "Claire" sur la variable $prenom1"
echo  $prenom1 . '<br>';//affiche "Claire", cela remplce "Bruno" par "Claire"

$prenom2 = "Nicolas ";// affectation de la valeur "Nicolas" sur la variable $prenom2
$prenom2 .= "Marie";// affectation de la valeur "Marie" sur la variable $prenom2
echo $prenom2 . '<br>';// affiche "Nicolas Marie" ... cela ajoute SANS remplacer la valeur précédente grâce à l'opérateur .=

//------------------------------------------------------------------------------

echo '<hr><h2> Guillemets et quotes </h2>';
$message = "aujourd'hui";
$message = 'aujourd\'hui';
$txt = 'Bonjour';
echo $txt . 'tout le monde'.'<br>';// Concaténation
echo "$txt tout le monde<br>";// Affichage dans les guillemets, la variable est évaluée
echo '$txt tout le monde';// Affichage dans des quotes, la variable n'est pas évaluée

//------------------------------------------------------------------------------

echo '<hr><h2> Constante et constante magique </h2>';
// Une constante tout comme une variable permet de conserver une valeur sauf que comme son nom l'indique, la valeur est constante. c'est à dire que l'on ne pourra pas la changer durant l'éxecution du script. Contraireemnt à une variable qui elle peut varier.
define("CAPITALE", "Paris");// Par convention, une constante se déclare toujours en majuscule
echo CAPITALE . "<br>";// Affichage du contenu de la constante CAPITALE : Paris

// Constante magique
echo __FILE__ ."<br>";
echo __LINE__ ."<br>";

//------------------------------------------------------------------------------
// Exercice : afficher Bleu-Blanc-Rouge (avec les tirets) en mettant chaque couleur dans une variable
$couleur1 = "Bleu";
$couleur2 = "Blanc";
$couleur3 = "Rouge";
echo "$couleur1-$couleur2-$couleur3";

//------------------------------------------------------------------------------
echo '<hr><h2> Opérateurs arithmétiques </h2>';
$a = 10;
$b = 2;
echo $a + $b . '<br>';//affiche 12
echo $a - $b . '<br>';// affiche 8
echo $a * $b . '<br>';//affiche 20
echo $a / $b . '<br>';//affiche 5

// opération / affectation
$a = 10;
$b = 2;
$a += $b; // equivaut à $a = $a +$b
echo $a . '<br>'; // Affiche 12
$a -= $b; // equivaut à $a-$b ($a = 12 - 2)
echo $a . '<br>'; // Affiche 10
$a *= $b; // equivaut à $a*$b ($a = 10 * 2)
echo $a . '<br>'; // Affiche 20
$a /= $b; // equivaut à $a/$b ($a = 20 / 2)
echo $a . '<br>'; // Affiche 10
//contexte : pratique pour faire des calculs sur un panier...

//------------------------------------------------------------------------------
echo '<hr><h2> Structures conditionnelles (if/else) - opérateurs de comparaison</h2>';

/*
Opérateurs     signification
=              est également
==             comparaison de la valeur
===            comparaison de la valeur et du type
!=             différent de
!              n'est pas
>              strictement supérieur...
<              strictement inférieur...
<=             inférieur ou égal à
>=             supérieur ou égal à
&& / AND       et
|| / OR        ou
XOR            ou exclusif
*/

// isset & Empty
// isset test si c'est définie ----- empty si c'est vide
$var1 = false;
$var2 = "";// chaine vide
// différence entre empty et isset : si on met la var2 en commentaire, on ne passe plus dans le if isset, mais on continue de rentre dans le if empty

if(empty($var1))
{
    echo '0, vide ou non définie<br>'; // empty: test si c'est à 0, vide ou non définie
}
if(isset($var2))
{
    echo 'var2 existe et est définie par rien<br>'; // isset teste l'existence d'une variable
}

//------------------------------------------------------------------------------
 $a = 10;
 $b = 5;
 $c = 2;

 if($a > $b)
 {
     echo "A est bien supérieur à B<br>"; //Instruction d'affichage
 }
else
{
    echo "Non c'est B qui est supérieur à A<br>";// Sinon cas par défaut
}


if($a > $b && $b > $c)// si A est supérieur à B et que B est supérieur à C
{
    echo "OK pour les 2 conditions<br>";// instruction d'affichage
}
if($a == 9 || $b > $c)// si la valeur de A est égale à 9 ou que B est supérieur à C, le double = permet de comparé la valeur de l'intérieur de la variable
{
    echo "OK pour l'une des deux conditions<br>";// instruction d'affichage
}
else // cas par defaut
{
    echo "Nous sommes dans le else<br>";
}

//------------------------------------------------------------------------------
if($a == 8)
{
    echo "1 - A est égal à 8<br>";// instruction d'affichage
}
elseif($a != 10)//Sinon si A est différent de 10
{
    echo "2 - A est différent de 10<br>";//instruction d'affichage
}
else
{
    echo "3 - tout le monde a faux<br>";
}
// Avec des elseif, si la condition est respectée, le script s'arrete et les conditions suivantes ne sont pas évaluées, au contraire en posant plusieurs conditions if, elles seront toutes évaluées même si les conditions précédentes sont respectées.

// Condution exclusive
if ($a == 10 XOR $b == 6) // XOR seulement l'une des 2 conditions doit etre valide
{
    echo 'ok condition exclusive<br>'; // si les 2 conditions sont bonnes ou mauvaise, nous ne rentrons pas ici
}
else{
    echo "Les deux conditions sont soient bonne ou mauvaise";
}
//------------------------------------------------------------------------------
// Forme contractée : 2éme possibilité d'écriture des if
echo ($a == 10 ) ? "A est egal a 10<br>" : "A n'est pas egal à 10<br>";
// le ? remplace le if -- les : remplace le else

// -----------------------------------------------------------------------------
//comparaison
$vara = 1;
$varb = "1";
echo gettype($vara) . '<br>';
echo gettype($varb) . '<br>';
if ($vara === $varb)
{
    echo "il s'agit de la même chose";
}

// Avec la présence, le triple egal, le test ne fonctionne pas car les type des variables sont différents.  INT(entier) n'est pas egal à STRING(chaine de caractere)
// = affectation
// == comparaison de la valeur
// === comparaison de la valeur et du type

//------------------------------------------------------------------------------
echo '<hr><h2> Conditions SWITCH</h2>';
// les 'case' represente des cas différents dans lesquel nous pouvons potentiellement tomber
// le 'break permet d'interrompre le script si nous rentrons dans un des Commentaires// si l'on a un certains nombre de cas à comparer; il serait interressant d'utiliser la condition switch
$couleur = 'jaune';
switch($couleur)
{
    case 'bleu' :
    echo "Vous aimez le bleu<br>";
    break;

    case 'rouge' :
    echo "Vous aimez le rouge<br>";
    break;

    case 'vert' :
    echo "Vous aimez le vert<br>";
    break;

    default :
    echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert<br>";
    break;
}

// Exercices : Pouvez-vous faire la même condition switch avec des if/else ? EST CE POSSIBLE ?

$couleur = 'jaune';
if ($couleur == 'bleu')
{
    echo "vous aimez le bleu<br>";
}
elseif ($couleur == 'rouge')
{
    echo "vous aimez le rouge";
}
elseif ($couleur == 'vert')
{
    echo "vous aimez le vert";
}
else {
    echo "Vous n'aimez ni le bleu, ni le rouge, ni le vert";
}

echo '<hr><h2> Structure itérative : boucle</h2>';
$i = 0;
while($i < 3)
{
    echo "$i---";
    $i++;
}
echo "<br>";
//
$i = 0;
while($i < 3)// tant que $i est inférieur à 3
{


    if ($i == 2) {
        echo $i;// Je rentre 1 fois ici

    }
    else {
        echo "$i---";// J e rentre 2 fois ici

    }
    $i++;// incrémentation du "compteur" pour que la boucle puisse tourner

}
//------------------------------------------------------------------------------
// Boucle For
echo '<br>';

for ($j = 0; $j < 16; $j++)// valeur de départ; condition d'entrée; incrémentation
{
    echo $j."<br>";
}
// exercice : afficher 30 option via une boucle

echo '<select>';
 for ($k = 1; $k < 31; $k++)
 {
     echo '<option>'.$k.'</option>';
 }
echo '</select>';

echo '<br>';

echo '<select>';
 for ($l = 30; $l >= 0; $l--) //décrémentation, equivaut a $l = $l - 1
 {
     echo '<option>'.$l.'</option>';
 }
echo '</select>';

// Exercice : faire une boucle qui affiche de 0 à 9 sur le même ligne sous forme de tableau HTML
echo "<table>";
echo "<tr>";
for ($m = 0; $m <= 9; $m++)
{
    echo '<td>'.$m.'</td>';
}
echo "</tr>";
echo "</table>";
echo "<br>";

// Exercice: faire la même chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles

echo "<table>";
for ($ligne=0; $ligne < 10; $ligne++) {
    echo "<tr>";
    for ($cellule = 0; $cellule <= 9; $cellule++)
    {
        echo '<td>'.(10*$ligne+$cellule).'</td>';

    }
    echo "</tr>";
}
echo "</table>";
echo "<br>";

 // 2eme solution

 $compteur = 0;
 echo "<table>";
 for ($ligne=0; $ligne < 10; $ligne++) {
     echo "<tr>";
     for ($cellule = 0; $cellule <= 9; $cellule++)
     {
         echo '<td>'.($compteur).'</td>';
         $compteur++;
     }
     echo "</tr>";
 }
 echo "</table>";

 echo '<hr><h2>Fonctions prédéfinies</h2>';
 //Une fonction prédéfinie permet de réaliser un traitement spécifique, vous pouvez les consulter dans la doc, il y en a beaucoup (php.net)

 echo '<br>Date : <br>';
 echo date("d/m/Y"); // exemple de la fonction prédéfinie permettant de renvoyer la date. Le Y majuscule permet d'obtenir 2017 et le y miniscule permet d'obtenir 17
 // quand on utilise une fonction prédéfinie, on doit toujours se demander ce que l'on doit lui envoyer comme argument/paramètres pour qu'elle s'execute et ce qu'elle peut retourner

 //-----------------------------------------------------------------------------

 echo '<hr><h2>Fonctions prédéfinies : traitement des chaines</h2>';

 $email = "catherine.cabeuil@lepoles.com";
 echo strpos($email, "@");// indique la position 17 et non 18 (compte commence de 0) du caractere "@" dans la chaine

 $email2 = "Bonjour";
 echo strpos($email2, "@");// cette ligne ne retourne rien, pourtant il ya bien quelque chose à l'intérieur: FALSE!
 echo "<br>";

 var_dump(strpos($email2, "@"));// grace au var_dump on apercoit le FALSE si le caractere "@" n'est pas trouvé. var_dump est donc une instruction d'affichage améliorée que l'on utilise régulièrement en phase de développement
echo "<br>";
 // strpos() est une fonction prédéfinie permettant de trouver la position d'un caractère dans une chaine:
 //Succès : int (entier)
 // echec : boolean false
 /* argument(s):
 1. Nous devons lui fournir la chaine dans laquelle nous souhaitons chercher
 2.Nous devons lui fournir l'information à chercher.

 contexte : nous pourrons l'utiliser pour savoir si une adresse email a un format conforme
 */

 //-----------------------------------------------------------------------------
 $phrase = "Mettez une phrase à cet endroit";
 echo iconv_strlen($phrase);
 echo "<br>";

 /*
 iconv_strlen() est une fonction prédéfinie permettant de retourner la taille d'une chaine :
 Succès : int (entier)
 echec : boolean false
 Nous devons lui fournir en argument la chaine dans laquelle nous souhairons connaitre la tailles

 contexte : nous pourrons l'utiliser pour savoir si le pseudo et le mdp lors d'une inscription on des tailles conformes
 */

 //-----------------------------------------------------------------------------

 $texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan posuere erat nec viverra. Etiam nec molestie quam, non auctor orci. Vestibulum vestibulum nulla in magna consequat porta. Maecenas eu porttitor mi, id tempus ligula. Mauris vitae maximus metus. Proin arcu quam, semper sed vulputate eget, tempor ut nunc. Aliquam scelerisque, justo sit amet volutpat rutrum, lorem nunc dignissim diam, nec pretium erat leo eu mi.";

 echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a>";
 /*
 retourne une partie du texte seuelement, avec un lien pour la suite de l'article

 substr() est une fonction prédéfinie permettant de retourner une partie de la chaine
 Succès : int (entier)
 echec : boolean false
 argument(s):
 1. nous devons lui fournir la chaine que l'on souhaite couper
 2. nous devons lui préciser la position de début
 3. nous devons lui préciser la position de fin

 Contexte : substr est souvent utilisé pour afficher des actualités avec une "accroche"
 */

 echo '<hr><h2>Fonctions utilisateur</h2>';
// les fonctions qui ne sont pas prédéfinies dans le langage sont déclaré puis executé par l'utilisateur

//Nous aurions pu donner un autre nom à cett fonction, c'est nous qui decidons
 function separation()// déclaration d'une fonction prévue pour ne pas reevoir d'arguments
 {
     echo "<hr><hr><hr>";
 }

 separation();//execution de la fonction

 //-----------------------------------------------------------------------------
 // Fonction avec argument : les arguments sont des paramètres fournis à la fonction et lui permettent de compléter ou modifier son comportement initialement prevu
 function bonjour($qui)// $qui, ça ne sort pas de nul part. Cela permet de recevoir un argument, il faut lui envoyer un argument
 {
     echo "Bonjour $qui <br>";
 }

$prenom = "Stevy";
//execution
 bonjour("Pierre");// si la fonction reçoit un argument, il faut lui envoyer un argument
 bonjour($prenom);// l'argument peut aussi etre une variable

 //-----------------------------------------------------------------------------
 function appliqueTVA ($nombre)
 {
     return $nombre * 1.2;// (1+20/100) calcul du taux de TVA à 20%, une fonction peut retourner quelque chose (à ce moment la on quitte la fonction)
 }
echo appliqueTVA(150);// on éxecute la fonction, on place un echo puisque l'on utilise le mot clé return à l'intérieur de la fonctionne
echo "<br>";
// Exercice: Pourriez vous ameliorer cette fonction afin que l'on puisse calculé un nombre avec les taux de notre choix

function appliqueTVA1 ($nombre, $taux)
{
    return $nombre * $taux;
    //return $nombre * (1+$taux/100); calcul du taux
}
echo appliqueTVA(150, 1.2) . "<br>";
// attention nous l'avons appelé appliqueTVA1 car 2 fonctions ne doivent pas posséder le même nomm

//------------------------------------------------------------------------------
meteo("hiver", 15);// il est possible d'éxecuter une fonction avant de l'avoir déclarée
function meteo($saison, $temperature)
{
    echo "Nous sommes en $saison et il fait $temperature degré(s)<br>";
}

//Gérer le S de degrés avec un if/else
function meteo1($saison, $temperature)
{
    if ($temperature == 1 OR $temperature == 0 OR $temperature == -1) {
        echo "Nous sommes en $saison et il fait $temperature degré<br>";
    } else {
        echo "Nous sommes en $saison et il fait $temperature degrés<br>";
    }
}
meteo1("hiver",15);
/* ou
function meteo1($saison, $temperature)
{
echo "Nous sommes en $saison et il fait $temperature";
    if ($temperature > 1 ||  $temperature < -1) {
        echo "degrés"
    } else {
        echo "degré<br>";
    }
}
meteo1("hiver",15);
*/
//------------------------------------------------------------------------------
$pays = "France";
function affichagePays()
{
    global $pays;// le echo qui suit ne fonctionnerait pas si nous n'avions pas mis le mot-clé global pour importer tout ce qui est déclaré de l'espace global dans l'espace local
    echo $pays;
}
affichagePays();
// lorsqu'on travaille à l'intérieur d'une fonction PHP, on se trouve dans l'espace local, tout ce qui est déclaré à l'extérieur d'une fonction se trouve dans l'espace global (espace par défaut)

//------------------------------------------------------------------------------
function jourSemaine()
{
    $jour = "lundi";// variable locale
    return $jour;// une fonction peut retourner quelque chose (à ce moment la on quitte la fonction)
    echo "ALLO";
}
//echo $jour; ne fonctionne pas car cette variable n'est connue qu'à l'intérieur de la fonction
echo jourSemaine();// On éxecute la fonction 
