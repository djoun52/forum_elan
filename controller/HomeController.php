<?php
    namespace Controller;

    use App\Session;
    use Model\UserManager;
    use Model\TopicsManager;
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
                "view" => "topics.php", 
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

            // Session::authenticationRequired("ROLE_ADMIN");
            
            $topicssmodel = new TopicsManager();
            $topics = $topicssmodel->findAllTopics();
     
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
            $categorie = $categoriemodel->findAllCategorie();
            
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