<?php
    namespace Model;

    use App\AbstractEntity;

    class Sujets extends AbstractEntity
    {
        private $id;
        private $titre;
        private $statut;
        private $datedecreation;
        private $user_id;
        private $categorie_id;

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
        public function getDatedecreation($format)
        {
             return $this->datedecreation->format($format);
        }
        
        public function setDatedecreation($datedecreation)
        {
                $this->datedecreation = new \DateTime($datedecreation);

                return $this;
        }  
        
        /**
         * Get the value of categorie_id
         */ 
        public function getCategorie_id()
        {
                return $this->categorie_id;
        }

        /**
         * Set the value of categorie_id
         *
         * @return  self
         */ 
        public function setCategorie_id($categorie_id)
        {
                $this->categorie_id = $categorie_id;

                return $this;
        }


        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }

        public function __toString(){
                return $this->titre;
            }

    }