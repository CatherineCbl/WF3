<?php
require '../../connexion/connexion.php';?>
<?php

	

	$msg_auth_err=''; // on initialisz la variable en cas d'erreur

	if(isset($_POST['connexion'])){// on envoie le form avec le name du bouton (on a cliqué sur le bouton)
		$email = addslashes($_POST['email']);
		$mdp = addslashes($_POST['mdp']);

		$sql = $pdoCV->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' ");
		$sql->execute();
		$nbr_utilisateur= $sql->rowCount();

			if($nbr_utilisateur==0){
				$msg_auth_err="Erreur d'authentification !";
			}
			else{
				$ligne_utilisateur= $sql->fetch();
				$_SESSION['connexion']='connecté';
				$_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
				$_SESSION['prenom']=$ligne_utilisateur['prenom'];
				$_SESSION['nom']=$ligne_utilisateur['nom'];

				header('location:index.php');
				exit();
			}



	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin :</title>
        <link rel="stylesheet" href="../css/authentification.css">
    </head>
    <body>
        <div class="container">
    	<div class="login-container">
                <div id="output"></div>

                <div class="form-box">
                    <form action="authentification.php" method="POST">
                        <input name="email" type="text" placeholder="Votre E-mail">
                        <input type="password" placeholder="Votre mot de passe" name="mdp">
                        <button class="btn btn-info btn-block login" type="submit" name="connexion">Connexion à l'admin</button>
                    </form>
                </div>
            </div>

    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>s
    </body>
</html>
