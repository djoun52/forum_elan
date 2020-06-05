<?php
    namespace Controller;

    use Model\UserManager;
    use App\Session;
    use App\Router;

    class SecurityController
    {
        public function login(){

            if(!empty($_POST)){
                $username = filter_input(INPUT_POST, "username",);
                $password = filter_input(INPUT_POST, "password");
      
                $model = new UserManager();
                

                if($user = $model->findOneByPseudo($username)){
                    if($_POST['remember'] == true) {
                        // J'attribut un cookie
                        setcookie('auth', $user->getSecret(), time() + 3600*24*7, '/');
                    }
                   
                    if(password_verify($password, $user->getPassword())){
                        Session::setUser($user);
                        Router::redirectTo("home","listTopics");
                    }
                    else var_dump("MOTS DE PASSE POURRIS");
                }   
                else var_dump("USER INEXISTANT");              
            }
                
            return [
                "view" => "login.php", 
                "data" => null
            ];
        }

        public function register(){

            if(!empty($_POST)){
                
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => "/^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/")));
                $pass2 = filter_input(INPUT_POST, "pass2");

                if($pseudo && $email && $pass1 && $pass2){
                    
                    if($pass1 == $pass2){
                        $model = new UserManager();

                        if(!$model->findOneByPseudo($pseudo)){
                            if(!$model->findOneByEmail($email)){
                                $hash = password_hash($pass1, PASSWORD_ARGON2I);
                                $secret = bin2hex(random_bytes(24));
                                if($model->addUser($pseudo, $hash,$secret,$email)){
                                Router::redirectTo("security", "login");
                                }
                            }
                            else var_dump("EMAIL DEJA EXISTANT");
                        }
                        else var_dump("USER DEJA EXISTANT");
                    }
                    else var_dump("MOTS DE PASSE DIFFERENTS");
                }
                else var_dump("CHAMPS MANQUANTS");      
            }
                
            return [
                "view" => "register.php", 
                "data" => null
            ];
        }
        public function affiche(){
            return false;
        }

        public static function connectWithCookie() {
            if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
                $model = new UserManager();
                if($user = $model->findUserByCookie($_COOKIE['auth'])){
                    Session::setUser($user);
                }
            }
        }




        
        public function logout(){
            Session::removeUser();
            setcookie('auth', '', time() -1, '/');
            Router::redirectTo("home");
        }
    }