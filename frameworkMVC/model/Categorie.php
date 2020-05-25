<?php
    namespace Model;

    use App\AbstractEntity;

    class Categorie extends AbstractEntity
    {
        private $id_categorie;
        private $nom_categorie;
       
        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
        /**
         * Get the value of nom_categorie
         */ 
        public function getNom_categorie()
        {
                return $this->nom_categorie;
        }

        /**
         * Set the value of nom_categorie
         *
         * @return  self
         */ 
        public function setNom_categorie($nom_categorie)
        {
                $this->nom_categorie = $nom_categorie;

                return $this;
        }

        /**
         * Get the value of id_categorie
         */ 
        public function getId_categorie()
        {
                return $this->id_categorie;
        }

        /**
         * Set the value of id_categorie
         *
         * @return  self
         */ 
        public function setId_categorie($id_categorie)
        {
                $this->id_categorie = $id_categorie;

                return $this;
        }

        public function __toString(){
            return $this->nom_categorie;
            ;
        }
    }