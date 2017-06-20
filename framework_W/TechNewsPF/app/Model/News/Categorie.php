<?php
namespace Model\News;


class Categorie{
    private $IDCATEGORIE,
            $LIBELLECATEGORIE,
            $ROUTECATEGORIE;

    public function __construct($IDCATEGORIE, $LIBELLECATEGORIE, $ROUTECATEGORIE=null){
        $this->IDCATEGORIE      = $IDCATEGORIE;
        $this->LIBELLECATEGORIE = $LIBELLECATEGORIE;
        $this->ROUTECATEGORIE   = $ROUTECATEGORIE;
    }

    public function getIDCATEGORIE(){
        return $this->IDCATEGORIE;
    }

    public function getLIBELLECATEGORIE(){
        return $this->LIBELLECATEGORIE;
    }

    public function getROUTECATEGORIE(){
        return $this->ROUTECATEGORIE;
    }

}
