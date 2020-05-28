<?php

namespace Controller;
use App\Session;
use Model\SujetsManager;


class ResercheController
{
    public function reserche()
    {
        Session::authenticationRequired("ROLE_USER");

        if (!empty($_POST['reserche'])){

            switch ($_POST['type']) {
                case 'categorie':
                    $usermodel = new SujetsManager();
                    $topics = $usermodel->findSujetsByCategorie($_POST["reserche"]);
                    return [
                        "view" => "topics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
                case 'mot':
                    $sujetmodel = new SujetsManager();
                    $topics = $sujetmodel->findSujetsBymots($_POST["reserche"]);
                    return [
                        "view" =>"topics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
            }
        }else {
            header('Location: ?ctrl=home&method=reserche    ');
        }
    
    }
    public function reserchelink()
    {
        Session::authenticationRequired("ROLE_USER");

        if (!empty($_POST['reserche'])){

            switch ($_POST['type']) {
                case 'categorie':
                    $usermodel = new SujetsManager();
                    $topics = $usermodel->findSujetsByCategorie($_POST["reserche"]);
                    return [
                        "view" => "topics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
                case 'mot':
                    $sujetmodel = new SujetsManager();
                    $topics = $sujetmodel->findSujetsBymots($_POST["reserche"]);
                    return [
                        "view" =>"topics.php",
                        "data" => [
                            "topics" => $topics,
                        ]
                    ];
                    break;
            }
        }else {
            header('Location: ?ctrl=home&method=reserche    ');
        }
    
    }

   
}
