<?php

namespace Controller;
use App\Session;

use Model\TopicsManager;
use Model\CategorieManager;
use Model\MessageManager;


class CreateController
{


    public function creatTopics()
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
                $model = new TopicsManager();
                if (!$model->findOneBytitre($titre)) {
                     
                    //  var_dump($titre);

                    $model-> addTopics($titre,$categorieObj->getId());
                }
                $modelMess= new MessageManager;
                $sujet= $model->findOneBytitre($titre) ; 
                // var_dump($sujet->getId());
                $modelMess->addMessage($message,$sujet->getId());

                header("Location: ?ctrl=topics&method=listeMessage&topics=$titre");  
                die(); 
            }
        }
            return [
            "view" => "home.php", 
            "data" => null
        ];
        }
      
    }


 
    public function createCategorie() {
        if (!empty($_POST['categorie'])){
            $categorie = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING);
            $model = new CategorieManager();
            if(!$model->findOneByNom($categorie)){
                $model->addcategorie($categorie);

                header("Location: ?ctrl=home&method=listCategorie");  
            
            }else {
                var_dump("la categorie existe deja");
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
