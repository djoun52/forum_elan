<?php
    namespace Model;
    
    use App\AbstractManager;

    class UserManager extends AbstractManager
    {
        private static $classname = "Model\User"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findOneByPseudo($pseudo){
            
            $sql = "SELECT * FROM Users WHERE pseudo = :pseudo";

            return self::getOneOrNullResult(
                self::select($sql, ['pseudo' => $pseudo], false),
                self::$classname
            );
        }
        public function findOneById($id){
            $sql = "SELECT * FROM Users WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }
        public function findOneByEmail($email){
            $sql = "SELECT * FROM Users WHERE email = :email";

            return self::getOneOrNullResult(
                self::select($sql, ['email' => $email], false),
                self::$classname
            );
        }
        public function addUser($pseudo, $hash,$secret,$email){
            $sql = "INSERT INTO Users (pseudo, password,secret, email) VALUES (:username, :password, :secret, :email)";

            return self::create($sql, [
                    'username' => $pseudo,
                    'password' => $hash,
                    'secert' => $secret,
                    'email' => $email,
            ]);
        }

        public function findAll(){
            $sql = "SELECT * FROM Users ORDER BY datedecreation DESC ";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        
        public function findUserByCookie($cookie) {

            $sql = "SELECT * FROM Users WHERE secret = :secret";
    
            return self::getOneOrNullResult(
                self::select($sql, ['secret' => $cookie], false),
                self::$classname
            );
        }
    }