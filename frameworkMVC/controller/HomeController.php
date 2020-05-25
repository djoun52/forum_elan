<?php
    namespace Controller;

    use App\Session;
    use Model\UserManager;

    class HomeController
    {
        public function index(){

            Session::authenticationRequired("ROLE_USER");

            return [
                "view" => VIEW_PATH."home.php", 
                "data" => null
            ];
        }

        public function listUsers(){

            Session::authenticationRequired("ROLE_ADMIN");

            $usermodel = new UserManager();
            $users = $usermodel->findAll();

            return [
                "view" => VIEW_PATH."users.php", 
                "data" => [
                    "users" => $users,
                    
                ]
            ];
        }
    }