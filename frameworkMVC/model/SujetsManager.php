<?php
    namespace Model;
    
    use App\AbstractManager;

    class sujetManager extends AbstractManager
    {
        private static $classname = "Model\Sujets"; //C'est le FQCN parce que la classe est dans une string

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findSujets($titre){
            
            $sql = "SELECT * FROM Sujets WHERE titre = :titre";

            return self::getOneOrNullResult(
                self::select($sql, ['titre' => $titre], false),
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

        public function findAll(){
            $sql = "SELECT * FROM Sujets";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
    }