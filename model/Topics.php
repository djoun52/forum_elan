<?php
    namespace Model;

    use App\AbstractEntity;

    class Topics extends AbstractEntity
    {
        private $id;
        private $titre;
        private $statut;
        private $datedecreation;
        private $user;
        private $categorie;

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
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        /**
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }

        public function __toString(){
                return $this->titre;
            }


        
    }