<?php

namespace Controller;

use \W\Controller\Controller;
use Model\News\CategorieModel;
use Model\Db\DbFactory;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		#connexion a la BDD
		DbFactory::start();

		#Récupération des articles spotlight
		$articlesSpotlight = \ORM::for_table('view_articles')
									->where('SPOTLIGHTARTICLE', '1')
									->find_result_set();

		#Récupération des articles de la page d'accueil
		$basicArticles = \ORM::for_table('view_articles')
								->find_result_set();

		#Transmission à la vue
		$this->show('default/home',['articlesSpotlight' => $articlesSpotlight, 'basicArticles'=>$basicArticles]);
	}


	#Permet d'afficher les articles d'une catégorie
	public function categorie($categorie)
	{
		#Connexion a la BDD
		DbFactory::start();

		#Récupération des Articles de la Catégorie
		$articles = \ORM::for_table('view_articles')
							->where('LIBELLECATEGORIE', ucfirst($categorie))
							->find_result_set();

		$this->show('default/categorie',['articles' => $articles, 'categorie' => $categorie]);
	}



	/**
	*Permet d'afficher un article
	*@param String $categorie
	*@param Entier $id
	*@param String $slug
	*/
	public function article($categorie, $id, $slug)
	{
		#Connexion a la BDD
		DbFactory::start();

		#Récupération des Articles de la Catégorie
		$articles = \ORM::for_table('view_articles')
							->find_one($id);

		#Récupération des Articles de la Catégorie (suggestions)
		$suggestions = \ORM::for_table('view_articles')
							#Je récupère uniquement les articles de la même catégorie que mon article
							  ->where('IDCATEGORIE', $articles->IDCATEGORIE)
							#Sauf mon article en cours
							  ->where_not_equal('IDARTICLE', $id)
							#3 articles maximum
							  ->limit(3)
							#Par ordre décroissant
							  ->order_by_desc('IDARTICLE')
							#Je récupère les résultats
							  ->find_result_set();

		$this->show('default/article',['article' => $articles, 'suggestions' => $suggestions, 'categorie' => $categorie]);
	}

}
