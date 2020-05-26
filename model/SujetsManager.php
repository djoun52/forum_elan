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
          
            $sql = "SELECT * FROM sujets s WHERE s.titre LIKE :mot ";

            return self::getResults(
                self::select($sql, ['mot' => '%'.$mot.'%'] , true),
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
            $sql = "SELECT * FROM sujets s INNER JOIN categorie c ON c.id_categorie = s.ID_categorie WHERE c.nom_categorie = :categorie";    

            return self::getResults(
                self::select($sql, ['categorie' =>$categorie], true),
                self::$classname
            );
        }

    }