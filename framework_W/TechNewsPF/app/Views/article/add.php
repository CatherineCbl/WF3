<?php
$this->layout('fulllayout', [
    'title'   => 'Ajouter un article',
    'current' => ''
]);
?>

<!-- Pour inclure du CSS -->
<?php $this->start('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha256-AWdeVMUYtwLH09F6ZHxNgvJI37p+te8hJuSMo44NVm0=" crossorigin="anonymous" />
<?php $this->stop('css'); ?>

 <!-- Pour inclure le contenu -->
<?php $this->start('contenu') ?>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                <h3>Ajouter un article</h3>

                <!-- Titre de l'article-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Titre de l'article</label>
                    <div class="col-md-9">
                        <input type="text" name="TITREARTICLE" placeholder="Titre de l'article" class="form-control">
                    </div>
                </div>
                <!-- Auteur-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Auteur</label>
                    <div class="col-md-9">
                        <select name="IDAUTEUR" class="form-control">
                            <?php foreach ($auteurs as $auteur): ?>
                                <option value="<?= $auteur->IDAUTEUR?>"><?= $auteur->PRENOMAUTEUR?> <?= $auteur->NOMAUTEUR;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- Catégorie-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Catégorie</label>
                    <div class="col-md-9">
                        <select name="IDCATEGORIE" class="form-control">
                            <?php foreach ($categories as $categorie): ?>
                                <option value="<?= $categorie->IDCATEGORIE?>"><?= $categorie->LIBELLECATEGORIE?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- Contenu-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-9">
                        <textarea name="CONTENUARTICLE" placeholder="Contenu de l'article" class="form-control"></textarea>
                    </div>
                </div>
                <!-- featured image-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Featured Image <em>(Image à la une)</em></label>
                    <div class="col-md-9">
                        <input type="file" name="FEATUREDIMAGE" class="dropify" data-max-file-size="3M">
                    </div>
                </div>
                <!-- option-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Option</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="SPECIALARTICLE" value="0">
                                <input type="checkbox" name="SPECIALARTICLE" value="1">Spécial
                            </label>
                            <label>
                                <input type="hidden" name="SPOTLIGHTARTICLE" value="0">
                                <input type="checkbox" name="SPOTLIGHTARTICLE" value="1">Spotlight
                            </label>

                        </div>
                    </div>
                </div>
                <!-- submit-->
                <div class="form-group">
                    <div class="col-xs-9 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary" value="Publier">Publier</button>
                    </div>
                </div>
            </form>
        </div>


<?php $this->stop('contenu') ?>

<!-- Pour inclure des scripts -->
<?php $this->start('script'); ?>
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha256-SUaao5Q7ifr2twwET0iyXVy0OVnuFJhGVi5E/dqEiLU=" crossorigin="anonymous"></script>
<script>
	CKEDITOR.replace( 'CONTENUARTICLE' );
</script>
<script>
    $('.dropify').dropify({
        messages:{
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier est trop volumineux'
        }
    });
</script>
<?php $this->stop('script'); ?>

 ?>
