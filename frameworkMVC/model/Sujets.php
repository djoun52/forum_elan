<?php
    namespace Model;

    use App\AbstractEntity;

    class sujet extends AbstractEntity
    {
        private $id_sujet;
        private $titre;
        private $statut;
        private $date_de_creation;

        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
       
        /**
         * Get the value of id_sujet
         */ 
        public function getId_sujet()
        {
                return $this->id_sujet;
        }

        /**
         * Set the value of id_sujet
         *
         * @return  self
         */ 
        public function setId_sujet($id_sujet)
        {
                $this->id_sujet = $id_sujet;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of statut
         */ 
        public function getStatut()
        {
                return $this->statut;
        }

        /**
         * Set the value of statut
         *
         * @return  self
         */ 
        public function setStatut($statut)
        {
                $this->statut = $statut;

                return $this;
        }
        public function getDate_de_creation()
        {
                return $this->date_de_creation;
        }
        
        public function setDate_de_creation($date_de_creation)
        {
                $this->date_de_creation = new \DateTime($date_de_creation);

                return $this;
        }
        
        public function __toString(){
                return $this->titre;
            }
    }