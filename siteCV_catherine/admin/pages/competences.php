<?php
require '../../connexion/connexion.php';

//gestion des contenus





// //modification d'une compétence
// //Je recupere la compétence
// $id_competence = $_GET['id_competence']; //par l'id et $_GET
// $sql = $pdoCV->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'");//la requête égale à l'id
// $ligne_competence = $sql->fetch();
include '../inc/nav.inc.php';
?>




        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_titres_cv WHERE utilisateur_id='1' ");
                    $ligne_titre = $sql->fetch();//va chercher sur une ligne!

                    ?>

                    <h1 class="page-header">Compétences</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_competences WHERE utilisateur_id='1' ");
                    $ligne_competence = $sql->fetchAll();
                    $nb_competences = count($ligne_competence);

                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-success hide" role="alert" id="success_add">
                                Compétence ajoutée avec <strong>succès!</strong>
                            </div>
                            <div class="alert alert-success hide" role="alert" id="success_remove">
                                Compétence supprimée avec <strong>succès!</strong>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <em><?php if ($nb_competences <= 1): ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_competences. " compétence."?>
                                    <?php else: ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_competences. " compétences."?>
                                    <?php endif; ?></em>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Compétences</th>
                                                    <th scope="col">Modifier</th>
                                                    <th scope="col">Supprimer</th>
                                                </tr>
                                                <?php foreach ($ligne_competence as $ligne_competences) : ?>
                                                <tr id="<?php echo $ligne_competences['id_competence']; ?>">
                                                    <td><?= $ligne_competences['competence'];?></td>
                                                    <td><a href="../pages/modif_competences.php?id_competence=<?php echo $ligne_competences['id_competence']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td><a id="suppression" href="<?php echo $ligne_competences['id_competence']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <form class="" action="competences.php" method="post">
                                <div class="form-group">
                                    <label for="competence">Ajouter une compétence</label>
                                    <input class="form-control" placeholder="Ex: SQL" name="competence" id="competence" required>
                                </div>
                                <button type="submit" class="btn btn-default" id="button_competence">Ajouter</button>
                            </form>
                            <?php
                            $heure = date("H:i");
                            setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
                            echo strftime("%A %d %B %Y");
                            echo "<br>".$heure;
                            ?>
                        </div>
                    </div>
                </div>

            </div>





            </div>
            <!-- /.row -->





    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- JavaScript Personnel -->
    <script src="../js/competences.js"></script>
</body>
</html>
