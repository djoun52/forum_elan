<?php
    namespace Model;

    use App\AbstractEntity;

    class Categorie extends AbstractEntity
    {
        private $id;
        private $nom;
        private $nbTopics;

       
        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }


        public function __toString(){
                return $this->nom;
                ;
        }

        /**
         * Get the value of nbTopics
         */ 
        public function getNbTopics()
        {
                return $this->nbTopics;
        }

        /**
         * Set the value of nbTopics
         *
         * @return  self
         */ 
        public function setNbTopics($nbTopics)
        {
                $this->nbTopics = $nbTopics;

                return $this;
        }
    }