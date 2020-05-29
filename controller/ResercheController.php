<?php

namespace Controller;
use App\Session;
use App\Router;
use Model\SujetsManager;


class ResercheController
{
    public function reserche()
    {
        Session::authenticationRequired("ROLE_USER");

        if (!empty($_POST['reserche'])){
            $reserche = filter_input(INPUT_POST, "reserche", FILTER_SANITIZE_STRING);
            switch ($_POST['type']) {
                case 'categorie':
  
                    $usermodel = new SujetsManager();
                    $topics = $usermodel->findSujetsByCategorie($reserche);
                    return [
                        "view" => "listeTopics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
                case 'mot':
                    $sujetmodel = new SujetsManager();
                    $topics = $sujetmodel->findSujetsBymots($reserche);
                    return [
                        "view" =>"listeTopics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
            }
        }
        return [
            "view" => "topics.php", 
            "data" => null
        ];
    
    }
    public function reserchelink()
    {
        Session::authenticationRequired("ROLE_USER");

        if ($_GET['categorie']){
            $categorie = filter_input(INPUT_GET, "categorie", FILTER_SANITIZE_STRING);
            $usermodel = new SujetsManager();
            $topics = $usermodel->findSujetsByCategorie($categorie);
            return [
                "view" => "listeTopics.php",
                "data" => [
                    "topics" => $topics,
                ]
        ]; 
        }

       
    }
    



    public function affiche(){
        return false;
   
    }
    
}
