<?php
    namespace Controller;

    use App\Session;
    use Model\UsersManager;
    use Model\SujetsManager;

    class HomeController
    {
        public function index(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => VIEW_PATH."home.php", 
                "data" => null
            ];
        }
        public function reserche(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => VIEW_PATH."reserche.php", 
                "data" => null
            ];
        }

        public function listUsers(){

            Session::authenticationRequired("ROLE_ADMIN");

            $usermodel = new UsersManager();
            $users = $usermodel->findAll();

            return [
                "view" => VIEW_PATH."users.php", 
                "data" => [
                    "users" => $users,
                    
                ]
            ];
        }
        public function listTopics(){

            Session::authenticationRequired("ROLE_ADMIN");

            $usermodel = new SujetsManager();
            $topics = $usermodel->findAllSujets();

            return [
                "view" => VIEW_PATH."topics.php", 
                "data" => [
                    "topics" => $topics,
                    
                ]
            ];
        }

        
    }