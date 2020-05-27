<?php
    namespace Model;
    
    use App\AbstractManager;

    class MessageManager extends AbstractManager
    {
        private static $classname = "Model\Message"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findMessage($texte){
            
            $sql = "SELECT * FROM Message WHERE texte = :texte";

            return self::getOneOrNullResult(
                self::select($sql, ['texte' => $texte], false),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * FROM Message WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }

        public function addMessage($texte){
            $sql = "INSERT INTO Message (texte) VALUES (:texte)";

            return self::create($sql, [
                    'texte' => $texte,

            ]);
        }

        public function findAll(){
            $sql = "SELECT * FROM Message";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
    }