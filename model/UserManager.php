<?php
    namespace Model;
    
    use App\AbstractManager;

    class UserManager extends AbstractManager
    {
        private static $classname = "Model\User"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findUser($pseudo){
            
            $sql = "SELECT * FROM User WHERE pseudo = :pseudo";

            return self::getOneOrNullResult(
                self::select($sql, ['pseudo' => $pseudo], false),
                self::$classname
            );
        }
        public function findOneById($id){
            $sql = "SELECT * FROM User WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }
        public function addUser($pseudo, $hash,$email){
            $sql = "INSERT INTO User (pseudo, password, email) VALUES (:username, :password, :email)";

            return self::create($sql, [
                    'username' => $pseudo,
                    'password' => $hash,
                    'email' => $email,
            ]);
        }

        public function findAll(){
            $sql = "SELECT * FROM User";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
    }