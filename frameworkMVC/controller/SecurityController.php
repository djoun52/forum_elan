<?php
    namespace Controller;

    use Model\UsersManager;
    use App\Session;
    use App\Router;

    class SecurityController
    {
        public function login(){

            if(!empty($_POST)){
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");

                $model = new UsersManager();
                if($user = $model->findUser($username)){
                    
                    if(password_verify($password, $user->getPassword())){
                        Session::setUser($user);
                        Router::redirectTo("home");
                    }
                    else var_dump("MOTS DE PASSE POURRIS");
                }   
                else var_dump("USER INEXISTANT");              
            }
                
            return [
                "view" => VIEW_PATH."login.php", 
                "data" => null
            ];
        }

        public function register(){

            if(!empty($_POST)){
                
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
                $pass1 = filter_input(INPUT_POST, "pass1");
                $pass2 = filter_input(INPUT_POST, "pass2");

                if($pseudo && $email && $pass1 && $pass2){
                    
                    if($pass1 == $pass2){
                        $model = new UsersManager();
                        if(!$model->findUser($pseudo)){
                            $hash = password_hash($pass1, PASSWORD_ARGON2I);
                            // $hash = $pass1;
                            if($model->addUser($pseudo, $hash,$email)){
                                Router::redirectTo("security", "login");
                            }
                        }
                        else var_dump("USER DEJA EXISTANT");
                    }
                    else var_dump("MOTS DE PASSE DIFFERENTS");
                }
                else var_dump("CHAMPS MANQUANTS");      
            }
                
            return [
                "view" => VIEW_PATH."register.php", 
                "data" => null
            ];
        }


        public function logout(){
            Session::removeUser();
            Router::redirectTo("home");
        }
    }