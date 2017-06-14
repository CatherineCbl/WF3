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
		$basicArticles = \ORM::for_table('view_articles')
								->find_result_set();
		$this->show('default/home',['articlesSpotlight' => $articlesSpotlight, 'basicArticles'=>$basicArticles]);
	}
	public function accueil()
	{
		$this->show('default/accueil');
	}
	public function catherine()
	{
		$this->show('default/catherine');
	}

}
