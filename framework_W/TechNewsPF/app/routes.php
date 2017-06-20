<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/accueil.cathy', 'Default#home', 'default_accueil'],

		#route pour afficher les articles d'une catégorie
		['GET', '/categorie/[:categorie]', 'Default#categorie', 'default_categorie'],

		#route pour afficher un article
		['GET', '/[:categorie]/[i:id]-[:slug].html', 'Default#article', 'default_article'],

		#route pour ajouter un article
		['GET|POST', '/article/ajouter-un-article.html', 'Article#add', 'article_add'],
	);
