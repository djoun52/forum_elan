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

        public function addMessage($texte,$topics_id){

            $sql = "INSERT INTO Message (texte, topics_id , user_id) VALUES (:texte , :topics_id, :user_id)";

            return self::create($sql, [
                    'texte' => $texte,
                    'topics_id' => $topics_id,
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
        public function findMessageByTopicsId($id){
            $sql = "SELECT m.id,m.texte, m.datedecreation,m.topics_id,m.user_id FROM message m 
                INNER JOIN topics t 
                ON t.id = m.topics_id
                WHERE t.id = :id
                ORDER BY m.datedecreation ASC ";

            return self::getResults(
                self::select($sql, ['id' =>$id], true),
                self::$classname
            );
        }
        public function removeMessage($id){

            $sql = "DELETE FROM `message` WHERE id = :id" ;
           
            return self::delete($sql, [ 
                    'id'=>$id 
            ]);
        }

        public function countMessageByTopicsId($id){
            $sql = "SELECT COUNT(topics_id) as nbmessage FROM `message` WHERE `topics_id` = :id";

            return self::getOneOrNullResultInt(
                self::select($sql, ['id' => $id], false)
            );
        } 

        public function edithMessage($id,$texte)
        {
            $sql = "UPDATE message  SET texte = :texte WHERE  id = :id" ;
            
            return self::update($sql, ['id'=>$id,'texte'=>$texte]);{}
        }
    }