<?php
require '../../connexion/connexion.php';

//gestion des contenus





// //modification d'une compétence
// //Je recupere la compétence
// $id_competence = $_GET['id_competence']; //par l'id et $_GET
// $sql = $pdoCV->query("SELECT * FROM t_realisations WHERE id_competence = '$id_competence'");//la requête égale à l'id
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

                    <h1 class="page-header">Réalisations</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_realisations WHERE utilisateur_id='1' ");
                    $ligne_realisation = $sql->fetchAll();
                    $nb_realisations = count($ligne_realisation);

                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <em><?php if ($nb_realisations <= 1): ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_realisations. " réalisation."?>
                                    <?php else: ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_realisations. " réalisations."?>
                                    <?php endif; ?></em>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Réalisations</th>
                                                    <th scope="col">Descriptions</th>
                                                    <th scope="col">Dates</th>
                                                    <th scope="col">Modifier</th>
                                                    <th scope="col">Supprimer</th>
                                                </tr>
                                                <?php foreach ($ligne_realisation as $ligne_realisations) : ?>
                                                <tr id="<?php echo $ligne_realisations['id_realisation']; ?>">
                                                    <td><?= $ligne_realisations['titre_r'];?></td>
                                                    <td><?= $ligne_realisations['description_r'];?></td>
                                                    <td><?= $ligne_realisations['dates_r'];?></td>
                                                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td><a href="<?php echo $ligne_realisations['id_realisation']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                            <form class="col-lg-6" action="realisations.php" method="post">
                                <div class="form-group">
                                    <label for="realisation">Ajouter une réalisation</label>
                                    <input class="form-control" placeholder="Exemple de site" name="titre_r" id="titre_r" required>
                                    <textarea class="form-control" name="description_r" id="description_r" required></textarea>
                                    <input class="form-control" type="date" name="dates_r" id="dates_r" required>
                                </div>
                                <button type="submit" class="btn btn-default" id="button_realisation">Ajouter</button>
                                <br>
                                <?php
                                $heure = date("H:i");
                                setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
                                echo strftime("%A %d %B %Y");
                                echo "<br>".$heure;
                                ?>
                            </form>
                        </div>
                    </div>
                </div>

            </div>





            </div>
            <!-- /.row -->



    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'description_r' );
    </script>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- JavaScript Personnel -->
    <script src="../js/realisations.js"></script>
</body>
</html>
