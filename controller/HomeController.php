<?php
    namespace Controller;

    use App\Session;
    use Model\UserManager;
    use Model\SujetsManager;
    use Model\CategorieManager;

    class HomeController
    {
        public function index(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => "home.php", 
                "data" => null
            ];
        }
        public function reserche(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => "listeTopics.php", 
                "data" => null
            ];
        }
        public function create(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => "create.php", 
                "data" => null
            ];
        }

      
        public function listUsers(){

            Session::authenticationRequired("ROLE_ADMIN");

            $usermodel = new UserManager();
            $users = $usermodel->findAll();

            return [
                "view" => "users.php", 
                "data" => [
                    "users" => $users,
                    
                ]
            ];
        }
        public function listTopics(){

            Session::authenticationRequired("ROLE_ADMIN");
            $categoriemodel= new CategorieManager;
            $sujetmodel = new SujetsManager();

            $categorie = $categoriemodel->findAllCategorie();
            foreach($categorie as $categorie){
                $topics = $sujetmodel->findAllSujets($categorie->getId());
                $categorie-> setNom($topics);
            }
        

            return [
                "view" => "listeTopics.php", 
                "data" => [
                    "topics" => $topics,
                    
                ]
            ];
        }
        public function listCategorie(){

            Session::authenticationRequired("ROLE_ADMIN");
            $categoriemodel= new CategorieManager;
            $sujetmodel = new SujetsManager();

            $sujets = $sujetmodel->findAllSujets();
            foreach($sujets as $sujets){
                $categorie = $categoriemodel->findAllCategorie($sujets->getId());
                $sujets-> setTitre($categorie);
            }
        

            return [
                "view" => "categorie.php", 
                "data" => [
                    "categorie" => $categorie,
                    
                ]
            ];
        }
        public function affiche(){
            return false;
        }
    }