<?php
    namespace Model;
    
    use App\AbstractManager;

    class SujetsManager extends AbstractManager
    {
        private static $classname = "Model\Sujets"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findSujetsBymots($mot){
          
            $sql = "SELECT * FROM sujets s WHERE s.titre LIKE :mot ORDER BY s.datedecreation DESC ";

            return self::getResults(
                self::select($sql, ['mot' => '%'.$mot.'%'] , true),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * FROM Sujets WHERE id = :id";

            return self::getOneOrNullResult(
                self::select($sql, ['id' => $id], false),
                self::$classname
            );
        }
        public function addSujets($titre, $statut){
            $sql = "INSERT INTO Sujets (titre, statut) VALUES (:titre, :statut)";

            return self::create($sql, [
                    'titre' => $titre,
                    'statut' => $statut
            ]);
        }

        public function findAllSujets(){
            $sql = "SELECT * FROM Sujets";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function findSujetsByCategorie($categorie){
            $sql = "SELECT * FROM sujets s INNER JOIN categorie c ON c.id = s.categorie_id WHERE c.nom = :categorie ORDER BY s.datedecreation DESC";    

            return self::getResults(
                self::select($sql, ['categorie' =>$categorie], true),
                self::$classname
            );
        }
        public function findByGrade($idcategorie){
            $sql = "SELECT id, username, createdat FROM user WHERE grade_id = :id";

            return self::getResults(
                self::select($sql, ['id' => $idcategorie], true),
                self::$classname
            );
        }

    }