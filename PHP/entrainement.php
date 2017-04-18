<style>h2{margin: 0; font-size: 20px; color: red;}</style>
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
while($i < 3)
{


    if ($i == 2) {
        echo $i;

    }
    else {
        echo "$i---";

    }
    $i++;

}
