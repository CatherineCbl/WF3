<?php require '../../connexion/connexion.php';
 ?>
<?php
// Gestion des contenus, mise à jour d'une Loisir
if(isset($_POST['loisir'])){
	$loisir = addslashes($_POST['loisir']);
	$id_loisir = $_POST['id_loisir'];
	$pdoCV->exec(" UPDATE t_loisirs SET loisir='$loisir' WHERE id_loisir='$id_loisir' ");
	header('location: ../pages/loisirs.php');
	exit();
}
// Je recupere la loisir
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir' "); // la requête égale à l'id
$ligne_loisirs = $sql->fetch(); //

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<?php
	$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur= '1' ");
	$ligne = $sql->fetch();// va chercher !
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?='<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>';?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->



	<!-- /.contenue modif-->

	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<section id="intro" class="intro-section">
						<form class="form-horizontal" method="post" action="modif_loisirs.php">
							<fieldset>

								<!-- Form Name -->
								<legend>Modification loisir</legend>

								<!-- Text input-->
								<div class="form-group">
									<label for="loisir" class="col-md-4 control-label" >Loisir</label>
									<div class="col-md-4">
										<input name="loisir" type="text" class="form-control input-md" value="<?= $ligne_loisirs['loisir']; ?>">
										<input name="id_loisir" hidden value="<?= $ligne_loisirs['id_loisir']; ?>">
									</div>
								</div>

								<!-- Button -->
								<div class="form-group">
									<label class="col-md-4 control-label" for=""></label>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        <a href="loisirs.php"><button type="button" name="button" class="btn btn-danger">Annuler</button></a>
									</div>
								</div>

							</fieldset>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
