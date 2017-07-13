<?php
require '../../connexion/connexion.php';
include '../inc/nav.inc.php';
?>





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_titres_cv WHERE utilisateur_id='1' ");
                    $ligne_titre = $sql->fetch();//va chercher sur une ligne!

                    ?>

                    <h1 class="page-header">Loisirs</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_loisirs WHERE utilisateur_id='1' ");
                    $ligne_loisir = $sql->fetchAll();
                    $nb_loisirs = count($ligne_loisir);

                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-success hide" role="alert" id="success_add">
                                Loisir ajouté avec <strong>succès!</strong>
                            </div>
                            <div class="alert alert-success hide" role="alert" id="success_remove">
                                Loisir supprimé avec <strong>succès!</strong>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <em><?php if ($nb_loisirs <= 1): ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_loisirs. " loisir."?>
                                    <?php else: ?>
                                        <?= $ligne_utilisateur['pseudo'].", vous avez enregistré " .$nb_loisirs. " loisirs."?>
                                    <?php endif; ?></em>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">Loisirs</th>
                                                    <th scope="col">Modifier</th>
                                                    <th scope="col">Supprimer</th>
                                                </tr>
                                                <?php foreach ($ligne_loisir as $ligne_loisirs) : ?>
                                                <tr id="<?php echo $ligne_loisirs['id_loisir']; ?>">
                                                    <td><?= $ligne_loisirs['loisir'];?></td>
                                                    <td><a href="../pages/modif_loisirs.php?id_loisir=<?php echo $ligne_loisirs['id_loisir']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td><a id="suppression" href="<?php echo $ligne_loisirs['id_loisir']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                            <form class="" action="loisirs.php" method="post">
                                <div class="form-group">
                                    <label for="loisir">Ajouter un loisir</label>
                                    <input class="form-control" placeholder="Ex: SQL" name="loisir" id="loisir" required>
                                </div>
                                <button type="submit" class="btn btn-default" id="button_loisir">Ajouter</button>
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

        </div>







    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- JavaScript Personnel -->
    <script src="../js/loisirs.js"></script>
</body>
</html>
