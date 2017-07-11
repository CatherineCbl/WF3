<?php
require '../../connexion/connexion.php';

//gestion des contenus





// //modification d'une compétence
// //Je recupere la compétence
// $id_competence = $_GET['id_competence']; //par l'id et $_GET
// $sql = $pdoCV->query("SELECT * FROM t_experiences WHERE id_competence = '$id_competence'");//la requête égale à l'id
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

                    <h1 class="page-header">Expériences</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_experiences WHERE utilisateur_id='1' ");
                    $ligne_experience = $sql->fetchAll();
                    $nb_experiences = count($ligne_experience);

                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <em><?php if ($nb_experiences <= 1): ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré <span class='nb_experiences'> " .$nb_experiences. "</span> expérience."?>
                                    <?php else: ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré <span class='nb_experiences'>" .$nb_experiences. "</span> expériences."?>
                                    <?php endif; ?></em>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Expériences</th>
                                                    <th scope="col">Entreprises</th>
                                                    <th scope="col">Descriptions</th>
                                                    <th scope="col">Dates</th>
                                                    <th scope="col">Modifier</th>
                                                    <th scope="col">Supprimer</th>
                                                </tr>
                                                <?php foreach ($ligne_experience as $ligne_experiences) : ?>
                                                <tr id="<?php echo $ligne_experiences['id_experience']; ?>">
                                                    <td><?= $ligne_experiences['titre_e'];?></td>
                                                    <td><?= $ligne_experiences['sous_titre_e'];?></td>
                                                    <td><?= $ligne_experiences['description_e'];?></td>
                                                    <td><?= $ligne_experiences['dates_e'];?></td>
                                                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td><a href="<?php echo $ligne_experiences['id_experience']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                            <form class="col-lg-6" action="experiences.php" method="post">
                                <div class="form-group">
                                    <label for="experience">Ajouter une expérience</label>
                                    <input class="form-control" placeholder="Ex: Caissier(e)" name="titre_e" id="titre_e" required>
                                    <input class="form-control" placeholder="Entreprise" name="sous_titre_e" id="sous_titre_e" required>
                                    <textarea class="form-control" name="description_e" id="description_e" required></textarea>
                                    <input type="date" class="form-control" name="dates_e" id="dates_e" required>
                                </div>
                                <button type="submit" class="btn btn-default" id="button_experience">Ajouter</button>
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

    <!-- JavaScript Personnel -->
    <script src="../js/experiences.js"></script>
</body>
</html>
