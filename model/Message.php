<?php
    namespace Model;

    use App\AbstractEntity;

    class Message extends AbstractEntity
    {
        private $id;
        private $texte;
        private $datedecreation;
        private $sujet_id;
        private $user_id;


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
         * Get the value of sujet_id
         */ 
        public function getSujet_id()
        {
                return $this->sujet_id;
        }

        /**
         * Set the value of sujet_id
         *
         * @return  self
         */ 
        public function setSujet_id($sujet_id)
        {
                $this->sujet_id = $sujet_id;

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
            return $this->texte;
        }

    

    }