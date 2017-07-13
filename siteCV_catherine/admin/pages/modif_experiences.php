<?php require '../../connexion/connexion.php';
 ?>
<?php
// Gestion des contenus, mise à jour d'une experience
if(isset($_POST['titre_e'])){
	$experience = addslashes($_POST['titre_e']);
	$entreprise = addslashes($_POST['sous_titre_e']);
	$description = addslashes($_POST['description_e']);
	$dates = addslashes($_POST['dates_e']);
	$id_experience = $_POST['id_experience'];
	$pdoCV->exec(" UPDATE t_experiences SET titre_e='$experience', sous_titre_e='$entreprise', description_e='$description', dates_e='$dates' WHERE id_experience='$id_experience' ");
	header('location: ../pages/experiences.php');
	exit();
}
// Je recupere la experience
$id_experience = $_GET['id_experience']; // par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_experiences WHERE id_experience = '$id_experience' "); // la requête égale à l'id
$ligne_experiences = $sql->fetch(); //

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
                        <form class="form-horizontal" method="post" action="modif_experiences.php">
							<fieldset>

							<!-- Form Name -->
							<legend>Form Name</legend>

							<!-- Text input-->
							<div class="form-group">
								<label for="titre_e" class="col-md-4 control-label" >Titre de l'expérience</label>
								<div class="col-md-4">
									<input name="titre_e" type="text" class="form-control input-md" value="<?= $ligne_experiences['titre_e']; ?>">
									<input name="id_experience" hidden value="<?= $ligne_experiences['id_experience']; ?>">
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label for="sous_titre_e" class="col-md-4 control-label" >Entreprise</label>
								<div class="col-md-4">
									<input name="sous_titre_e" type="text" class="form-control input-md" value="<?= $ligne_experiences['sous_titre_e']; ?>">
								</div>
							</div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description_e">Description</label>
                                <div class="col-md-4">
                                    <textarea name="description_e" id="description_e" cols="80" rows="4" class="form-control"><?= $ligne_experiences['description_e']; ?> </textarea>
                                </div>
                            </div>
							<!-- Text input-->
							<div class="form-group">
								<label for="dates_e" class="col-md-4 control-label" >Dates</label>
								<div class="col-md-4">
									<input name="dates_e" type="text" class="form-control input-md" value="<?= $ligne_experiences['dates_e']; ?>">
								</div>
							</div>

							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for=""></label>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    <a href="experiences.php"><button type="button" name="button" class="btn btn-danger">Annuler</button></a>
								</div>
							</div>

							</fieldset>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>

    <!-- ckeditor-->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'description_e' );
    </script>

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
