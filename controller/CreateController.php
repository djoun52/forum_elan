<?php

namespace Controller;
use App\Session;

use Model\SujetsManager;
use Model\CategorieManager;



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
            $categorieObj= $modelCategorie->findOneByNom($categorie) ;
            
           

            if($titre && $message && $categorie){
                $model = new SujetsManager();
                if (!$model->findOneBytitre($titre)) {
                     $t = Session::getUser();
                     var_dump($titre);
                     var_dump(Session::getUser()->getId());
                    $model-> addSujets($titre,$t->getId() ,$categorieObj->getId());
                    
                }
                
                  
                    
            }
        }
            return [
            "view" => "home.php", 
            "data" => Session::getUser()->getId()
        ];
        }
      
    }


 
    public function createscategorie() {
        if (!empty($_POST['categorie'])){
            $categorie = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING);
            $model = new CategorieManager();
            if(!$model->findOneByNom($categorie)){
                $model->addcategorie($categorie);

                
            
            }else {
                var_dump("la categorie existe deja");
            }
        }
            return [
                "view" => "create.php", 
                "data" => null
            ];
        

    }

    // public function affiche(){
    //     return false;
    // }

}
