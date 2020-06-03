<?php
    namespace Model;

    use App\AbstractEntity;

    class Topics extends AbstractEntity
    {
        private $id;
        private $titre;
        private $resolue;
        private $cloture;
        private $datedecreation;
        private $user;
        private $categorie;
        private $nbmessage;
        private $lastMessage;

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
         * Get the value of resolue
         */ 
        public function getResolue()
        {
                return $this->resolue;
        }

        /**
         * Set the value of resolue
         *
         * @return  self
         */ 
        public function setResolue($resolue)
        {
                $this->resolue = $resolue;

                return $this;
        }

        /**
         * Get the value of cloture
         */ 
        public function getCloture()
        {
                return $this->cloture;
        }

        /**
         * Set the value of cloture
         *
         * @return  self
         */ 
        public function setCloture($cloture)
        {
                $this->cloture = $cloture;

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


        

    

      

        /**
         * Get the value of nbmessage
         */ 
        public function getNbmessage()
        {
                return $this->nbmessage;
        }

        /**
         * Set the value of nbmessage
         *
         * @return  self
         */ 
        public function setNbmessage($nbmessage)
        {
                $this->nbmessage = $nbmessage;

                return $this;
        }

        /**
         * Get the value of lastMessage
         */ 
        public function getLastMessage()
        {
                return $this->lastMessage;
        }

        /**
         * Set the value of lastMessage
         *
         * @return  self
         */ 
        public function setLastMessage($lastMessage)
        {
                $this->lastMessage = $lastMessage;

                return $this;
        }
    }