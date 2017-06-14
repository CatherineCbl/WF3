<?php
namespace Model\News;

class CategorieModel extends \W\Model\Model{
    /**
     * R�cup�re les cat�gories depuis la BDD
     */
    public function getCategories() {
        $categories = $this->findAll();
        #print_r($categories);
        //Je crée un tableau vide pour stocker mes objets de categorie
        $data = [];


        //Je parcours mes categories et pour chacune d'elle je crée un nouvel objet.
        //Je place cet objet "Categorie" dans mon tableau "data"
        foreach ($categories as $categorie) {
            $data[] = new Categorie($categorie['IDCATEGORIE'], $categorie['LIBELLECATEGORIE'], $categorie['ROUTECATEGORIE']);
        }

        #print_r($data);

        //Ma fonction renvoie le tableau comprenant les objets de type categorie
        return $data;

    }
}
