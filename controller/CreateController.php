<?php

namespace Controller;
use App\Session;

use Model\SujetsManager;
use Model\CategorieManager;
use Model\MessageManager;


class CreateController
{
    public function createsujets()
    {
        Session::authenticationRequired("ROLE_USER");

        if (!empty($_POST['titre'])&&!empty($_POST['categorie'])&&!empty($_POST['message'])  ){
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $categorie = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
            if($categorie){
                $modelCategorie = new CategorieManager();
                    if(!$modelCategorie->findOneByNom($categorie)){
                    $modelCategorie->addcategorie($categorie);
                
            }
                $categorieObj=$modelCategorie->findOneByNom($categorie) ;
            }
         
            var_dump($titre);
            if($titre && $message ){
                $model = new SujetsManager();

                  $model-> addSujets($titre,$_SESSION['user']->getId(),$categorieObj->getId());
                  
                    
            }
        }
            return [
            "view" => "create.php", 
            "data" => null
        ];
        
      
    }


 
    public function createscategorie() {
        if (!empty($_POST['categorie'])){
            $categorie = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING);
            $model = new CategorieManager();
            if(!$model->findOneByNom($categorie)){
                $model->addcategorie($categorie);

                
            
            }else {
                var_dump("le sujet existe deja");
            }
        }
            return [
                "view" => "create.php", 
                "data" => null
            ];
        

    }

    public function affiche(){
        return false;
    }

}
