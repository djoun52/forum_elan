<?php
    namespace Model;

    use App\AbstractEntity;

    class User extends AbstractEntity
    {
        private $id;
        private $pseudo;
        private $password;
        private $email;
        private $statut;
        private $datedecreation;

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
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

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

        public function __toString(){
                return $this->pseudo;
        }
    }