<?php
if($_POST)
{
   echo 'pseudo :' . $_POST['pseudo'] . '<br>';
   echo 'email :' . $_POST['email'] . '<br>';
   echo '<hr>';

   foreach ($_POST as $indice => $valeur) {
       echo $indice . ' : ' . $valeur . '<br>';
   }
   if (empty($_POST['pseudo']) AND empty($_POST['email']))
   {
       echo 'Veuillez remplir le champs ';
   }
   else {
       echo 'Champ valide';
   }
   // if (iconv_strlen($_POST['pseudo']) == 0 || iconv_strlen($_POST['email']) == 0)
   // {
   //     echo 'Veuillez remplir le champs ';
   // }
   // else {
   //     echo 'Champ valide';
   // }
echo '<pre>'; print_r($_POST); echo '</pre>';
}

?>
<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8">
       <title>Formulaire3</title>
   </head>
   <body>
       <h1>Formulaire</h1>
       <form class="" action="formulaire4.php" method="post">

           <label for="">Pseudo</label><br />
           <input type="text" name="pseudo" value=""><br />

           <label for="">Email</label><br />
           <input type="text" name="email" value=""><br />

           <input type="submit" name="" value="envois">



   </body>
</html>
