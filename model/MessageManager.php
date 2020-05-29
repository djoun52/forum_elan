<?php
    namespace Model;
    use App\Session;
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

        public function addMessage($texte,$sujets_id){

            $sql = "INSERT INTO Message (texte, sujets_id , user_id) VALUES (:texte , :sujets_id, :user_id)";

            return self::create($sql, [
                    'texte' => $texte,
                    'sujets_id' => $sujets_id,
                    'user_id' => Session::getUser()->getId(),

            ]);
        }

        public function findAll(){
            $sql = "SELECT * FROM Message";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function findMessageByTopics($topics){
            $sql = "SELECT m.id,m.texte, m.datedecreation,m.sujets_id,m.user_id  FROM message m 
                INNER JOIN sujets s 
                ON s.id = m.sujets_id 
                WHERE s.titre = :topics
                ORDER BY m.datedecreation DESC ";

            return self::getResults(
                self::select($sql, ['topics' =>$topics], true),
                self::$classname
            );
        }
        public function removeMessage($id){

            $sql = "DELETE FROM `message` WHERE id = :id" ;
           
            return self::delete($sql, [ 
                    'id'=>$id 
            ]);
        }

        public function countMessageBySujetsId($id){
            $sql = "SELECT COUNT(sujets_id) FROM `message` WHERE `sujets_id` = :id;";

            return self::getOneOrNullResultInt(
                self::select($sql, ['id' => $id], false)
            );
        } 


    }