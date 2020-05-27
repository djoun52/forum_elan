<?php
    namespace Model;
    
    use App\AbstractManager;

    class CategorieManager extends AbstractManager
    {
        private static $classname = "Model\Categorie"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findNom_categorie($nom_categorie){
            
            $sql = "SELECT * FROM Categorie WHERE nom_categorie = :nom_categorie";

            return self::getOneOrNullResult(
                self::select($sql, ['nom_categorie' => $nom_categorie], false),
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

        public function addNom_categorie($nom_categorie){
            $sql = "INSERT INTO Categorie (nom_categorie) VALUES (:username,)";

            return self::create($sql, [
                    'nom_categorie' => $nom_categorie,
            ]);
        }

        public function findAllCategorie(){
            $sql = "SELECT * FROM Categorie";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
    }