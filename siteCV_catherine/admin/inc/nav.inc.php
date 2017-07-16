<?php
// session_start(); // a mettre dans toutes les pages de l'admin; SESSION et authentification
if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
}
else {//l'utilisateur n'est pas connecté
    header('location:authentification.php');
}
//pour se deconnecter
if (isset($_GET['quitter'])) {//on vide les variables de session
    $_SESSION['connexion']='';
    $_SESSION['id_utilisateur']='';
    $_SESSION['prenom']='';
    $_SESSION['nom']='';
    unset($_SESSION['connexion']);
    session_destroy();
    header('location:../../vitrine/index.php');
}
$sql = $pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='$id_utilisateur' ");
$ligne_utilisateur = $sql->fetch();//va chercher sur une ligne!
?>
<!DOCTYPE html>
<html lang="fr">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - <?= $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></title>

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
    <link rel="stylesheet" href="../css/monstyle.css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin <?= $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></a>
            </div>



                <!-- /.dropdown -->
            <ul class="nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../pages/index.php?quitter=oui"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> <?= $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></a>
                        </li>


                        <li>
                            <a href="competences.php"><i class="fa fa-edit fa-fw"></i> Compétences</a>
                        </li>
                        <li>
                            <a href="experiences.php"><i class="fa fa-edit fa-fw"></i> Expériences</a>
                        </li>
                        <li>
                            <a href="formations.php"><i class="fa fa-edit fa-fw"></i> Formations</a>
                        </li>
                        <li>
                            <a href="realisations.php"><i class="fa fa-edit fa-fw"></i> Réalisations</a>
                        </li>
                        <li>
                            <a href="loisirs.php"><i class="fa fa-edit fa-fw"></i> Loisirs</a>
                        </li>




                                <li>
                                    <a href="../pages/index.php?quitter=oui">Se déconnecter</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
