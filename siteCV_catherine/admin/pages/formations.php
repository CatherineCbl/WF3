<?php
require '../../connexion/connexion.php';

//gestion des contenus





// //modification d'une compétence
// //Je recupere la compétence
// $id_competence = $_GET['id_competence']; //par l'id et $_GET
// $sql = $pdoCV->query("SELECT * FROM t_formations WHERE id_competence = '$id_competence'");//la requête égale à l'id
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

                    <h1 class="page-header">Formations</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_formations WHERE utilisateur_id='1' ");
                    $ligne_formation = $sql->fetchAll();
                    $nb_formations = count($ligne_formation);

                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success hide" role="alert" id="success_add">
                                Formation ajoutée avec <strong>succès!</strong>
                            </div>
                            <div class="alert alert-success hide" role="alert" id="success_remove">
                                Formation supprimée avec <strong>succès!</strong>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <em><?php if ($nb_formations <= 1): ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_formations. " formation."?>
                                    <?php else: ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_formations. " formations."?>
                                    <?php endif; ?></em>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Formations</th>
                                                    <th scope="col">Ecoles, universités...</th>
                                                    <th scope="col">Descriptions</th>
                                                    <th scope="col">Dates</th>
                                                    <th scope="col">Modifier</th>
                                                    <th scope="col">Supprimer</th>
                                                </tr>
                                                <?php foreach ($ligne_formation as $ligne_formations) : ?>
                                                <tr id="<?php echo $ligne_formations['id_formation']; ?>">
                                                    <td><?= $ligne_formations['titre_f'];?></td>
                                                    <td><?= $ligne_formations['sous_titre_f'];?></td>
                                                    <td><?= $ligne_formations['description_f'];?></td>
                                                    <td><?= $ligne_formations['dates_f'];?></td>
                                                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td><a href="<?php echo $ligne_formations['id_formation']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                            <form class="col-lg-6" action="formations.php" method="post">
                                <div class="form-group">
                                    <label for="formation">Ajouter une formation</label>
                                    <input class="form-control" placeholder="Ex: Licence informatique" name="titre_f" id="titre_f" required>
                                    <input class="form-control" placeholder="Ecole" name="sous_titre_f" id="sous_titre_f" required>
                                    <textarea class="form-control" name="description_f" id="description_f" required></textarea>
                                    <input  type="date" class="form-control" name="dates_f" id="dates_f" required>
                                </div>
                                <button type="submit" class="btn btn-default" id="button_formation">Ajouter</button>
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
    CKEDITOR.replace( 'description_f' );
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
    <script src="../js/formations.js"></script>
</body>
</html>
