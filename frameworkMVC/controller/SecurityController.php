<?php
    namespace Controller;

    use Model\UserManager;
    use App\Session;
    use App\Router;

    class SecurityController
    {
        public function login(){

            if(!empty($_POST)){
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");

                $model = new UserManager();
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
                
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                $pass1 = filter_input(INPUT_POST, "pass1");
                $pass2 = filter_input(INPUT_POST, "pass2");

                if($username && $pass1 && $pass2){
                    
                    if($pass1 == $pass2){
                        $model = new UserManager();
                        if(!$model->findUser($username)){
                            $hash = password_hash($pass1, PASSWORD_ARGON2I);
                            if($model->addUser($username, $hash)){
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