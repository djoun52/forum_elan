<?php
    namespace Model;
    
    use App\AbstractManager;
    use App\Session;

    class TopicsManager extends AbstractManager
    {
        private static $classname = "Model\Topics"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findTopicsBymots($mot){
          
            $sql = "SELECT t.id,t.titre,t.resolue,t.cloture,t.datedecreation, t.user_id,t.categorie_id FROM topics t WHERE t.titre LIKE :mot ORDER BY t.datedecreation DESC ";

            return self::getResults(
                self::select($sql, ['mot' => '%'.$mot.'%'] , true),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * FROM topics WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }
        public function findOneBytitre($titre){
            $sql = "SELECT * FROM topics WHERE titre = :titre";

            return self::getOneOrNullResult(
                self::select($sql, ['titre' => $titre], false),
                self::$classname
            );
        }
        public function findOneidBytitre($titre){
            $sql = "SELECT id FROM topics WHERE titre = :titre";

            return self::getOneOrNullResult(
                self::select($sql, ['titre' => $titre], false),
                self::$classname
            );
        }
        public function addTopics($titre,$categorie){
         
            $sql = "INSERT INTO topics (titre, user_id, categorie_id  ) VALUES (:titre, :user_id, :categorie_id)";

            return self::create($sql, [
                    'titre' => $titre,  
                    'user_id' => Session::getUser()->getId(),  
                    'categorie_id' => $categorie
            ]);
        }

   
    
        public function findAllTopics(){
            $sql = "SELECT * FROM topics";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function findTopicsByCategorie($categorie){
            $sql = "SELECT t.id,t.titre,t.resolue,t.cloture,t.datedecreation, t.user_id,t.categorie_id FROM topics t 
                    INNER JOIN categorie c 
                    ON c.id = t.categorie_id 
                    WHERE c.nom = :categorie
                    ORDER BY t.datedecreation DESC ";   

            return self::getResults(
                self::select($sql, ['categorie' =>$categorie], true),
                self::$classname
            );
        }
        public function removeTopics($id){

            $sql = "DELETE FROM `topics` WHERE id = :id" ;
           
            return self::delete($sql, [ 
                    'id'=>$id 
            ]);
        }
        


        public function resolveTopic($id){
          $sql = "UPDATE topics t SET t.resolue= 1 WHERE t.id= :id " ;
       
        return self::update($sql, [ 
            'id'=>$id 
        ]);
        }

        public function EndTopic($id){
            $sql = "UPDATE topics t SET t.cloture= 1 WHERE t.id= :id " ;
       
            return self::update($sql, [ 
                'id'=>$id 
            ]);
        }
    }