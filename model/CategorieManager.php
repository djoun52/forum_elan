<?php
    namespace Model;
    
    use App\AbstractManager;

    class CategorieManager extends AbstractManager
    {
        private static $classname = "Model\Categorie"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findOneByNom($nom){
            
            $sql = "SELECT * FROM Categorie WHERE nom = :nom";

            return self::getOneOrNullResult(
                self::select($sql, ['nom' => $nom], false),
                self::$classname
            );
        }
        public function findOneIdByNom($nom){
            
            $sql = "SELECT id FROM Categorie WHERE nom = :nom";

            return self::getOneOrNullResult(
                self::select($sql, ['nom' => $nom], false),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * FROM Categorie WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }

        public function addcategorie($nom){
            $sql = "INSERT INTO Categorie (nom) VALUES (:nom)";

            return self::create($sql, [
                    'nom' => $nom,
            ]);
        }

        public function findAllCategorieWithCount(){
            $sql = "SELECT c.id, c.nom,COUNT(t.id) AS nbTopics  
            FROM Categorie c 
            INNER JOIN topics t 
            ON c.id = t.categorie_id 
            WHERE c.id = t.categorie_id
            GROUP BY c.id";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function findAllCategorie(){
            $sql = "SELECT * FROM Categorie";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function countnbtopicsbycategorie($id){
            $sql = "SELECT COUNT(topics_id) FROM `message` WHERE `topics_id` = :id;";

            return self::getOneOrNullResultInt(
                self::select($sql, ['id' => $id], false)
            );
        } 
    }