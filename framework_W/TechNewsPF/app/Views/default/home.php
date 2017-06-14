<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<!-- Pour inclure du CSS -->
<?php $this->start('css'); ?>
	<!-- Tout ce qui sera inclus ici, viendra se placer dans la section "css" du layout. -->
<?php $this->stop('css'); ?>

<?php $this->start('contenu') ?>


<div class="row">
<!--colleft-->
<div class="col-md-8 col-sm-12">
	<div class="box-caption">
		<span>spotlight</span>
	</div>
	<!--sportlight-->
	<section class="owl-carousel owl-spotlight">
		<?php foreach ($articlesSpotlight as $article) : ?>
		<div>
			<article class="spotlight-item">
				<div class="spotlight-img">
					<img alt="" src='<?= $this->assetUrl("images/product/". $article->FEATUREDIMAGEARTICLE); ?>'>
					<a href="#" class="cate-tag"><?= $article->LIBELLECATEGORIE?></a>
				</div>
				<div class="spotlight-item-caption">
					<h2 class="font-heading">
						<a href="<?= $this->assetUrl('article.html');?>">
							<?= $article->TITREARTICLE?>
						</a>
					</h2>
					<div class="meta-post">
						<a href="#">
								<?= $article->PRENOMAUTEUR?> <?= $article->NOMAUTEUR?>
						</a>
						<em></em>
						<span>
							<?= $article->DATECREATIONARTICLE?>
						</span>
					</div>
					<p><?= $article->CONTENUARTICLE?> </p>
				</div>
			</article>
		</div>
	<?php endforeach; ?>


	</section>

	<!--spotlight-thumbs-->
		<section class="spotlight-thumbs">
			<div class="row">
			<?php foreach ($basicArticles as $article) : ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="spotlight-item-thumb">
					<div class="spotlight-item-thumb-img">
						<a href="#">
							<img alt="" src='<?= $this->assetUrl("images/product/". $article->FEATUREDIMAGEARTICLE); ?>'>
						</a>
						<a href="#" class="cate-tag">business</a>
					</div>
					<h3><a href="#"><?= $article->TITREARTICLE?></a></h3>
					<div class="meta-post">
						<a href="#">
							<?= $article->PRENOMAUTEUR?> <?= $article->NOMAUTEUR?>
						</a>
						<em></em>
						<span>
							<?= $article->DATECREATIONARTICLE?>
						</span>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
	</section>
</div>
<?php $this->stop('contenu') ?>

<!-- Pour inclure des scripts -->
<?php $this->start('script'); ?>
	<!-- Tout ce qui sera inclus ici, viendra se placer dans la section "scripts" du layout. -->
<?php $this->stop('script'); ?>
