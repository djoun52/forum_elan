<?php
    namespace Model;

    use App\AbstractEntity;

    class Message extends AbstractEntity
    {
        private $id;
        private $texte;
        private $datedecreation;
        private $sujet;
        private $user;


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
         * Get the value of texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte = $texte;

                return $this;
        }    

       
        /**
         * Get the value of datedecreation
         */ 
        public function getDatedecreation()
        {
                return $this->datedecreation;
        }

        /**
         * Set the value of datedecreation
         *
         * @return  self
         */ 
        public function setDatedecreation($datedecreation)
        {
                $this->datedecreation = $datedecreation;

                return $this;
        }
       
        
      
        /**
         * Get the value of sujet
         */ 
        public function getSujet()
        {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         *
         * @return  self
         */ 
        public function setSujet($sujet)
        {
                $this->sujet = $sujet;

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

       
        
        public function __toString(){
            return $this->texte;
        }

    


    }