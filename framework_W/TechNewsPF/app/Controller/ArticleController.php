<?php
namespace Controller;

use W\Controller\Controller;
use Model\Db\DbFactory;
USE Model\Shortcut;


class ArticleController extends Controller{
    /**
    *Afficher et ajouter un article dans la BDD
    */
    public function add(){
        #Connexion a la BDD
        DbFactory::start();

        #Vérification de $_POST
        if (!empty($_POST)) :

            #Récupération des données POST
            extract($_POST);

            #Récupération de mon image
            $handle = new \upload($_FILES['FEATUREDIMAGEARTICLE']);
            if ($handle->uploaded) {
              $handle->file_new_name_body   = Shortcut::generateSlug($TITREARTICLE);
              $handle->image_resize         = true;
              $handle->image_x              = 1000;
              $handle->image_y              = 550;
              $handle->image_ratio_crop     = true;
              $handle->process('assets/images/product/');
              if ($handle->processed) {
                $FEATUREDIMAGEARTICLE = $handle->file_dst_name;
                $handle->clean();
              }
              else {
                  $FEATUREDIMAGEARTICLE = 'default.jpg';
                echo 'error : ' . $handle->error;
              }
            }

            #Ajout en BDD
            $article   = \ORM::for_table('article')->create();
            $categorie = \ORM::for_table('categorie')->find_one($IDCATEGORIE);
            #On associe les colonnes de notre BDD avec les valeurs du Formulaire
            #Colonne mySQL                #Valeurs formulaire
            $article->IDAUTEUR             =  $IDAUTEUR ;
            $article->IDCATEGORIE          =  $IDCATEGORIE;
            $article->TITREARTICLE         =  $TITREARTICLE;
            $article->CONTENUARTICLE       =  $CONTENUARTICLE;
            $article->SPECIALARTICLE       =  $SPECIALARTICLE;
            $article->SPOTLIGHTARTICLE     =  $SPOTLIGHTARTICLE;
            $article->FEATUREDIMAGEARTICLE =  $FEATUREDIMAGEARTICLE;

            #Insertion
            $article->save();

            #Redirection
            $this->redirectToRoute('default_article', [
                'categorie'   => strtolower($categorie->LIBELLECATEGORIE),
                'id'          => $article->IDARTICLE,
                'slug'        => Shortcut::generateSlug($TITREARTICLE)
            ]);
        endif;

        #Récupérer la Liste des Auteurs
        $auteurs = \ORM::for_table('auteur')->find_result_set();

        #Récupérer la Liste des Catégories
        $categories = \ORM::for_table('categorie')->find_result_set();

        #Affichage de la Vue
        $this->show('article/add', ['auteurs' => $auteurs, 'categories' => $categories]);
    }
}
