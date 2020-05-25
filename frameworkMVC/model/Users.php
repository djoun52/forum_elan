<?php
    namespace Model;

    use App\AbstractEntity;

    class Users extends AbstractEntity
    {
        private $id_user;
        private $pseudo;
        private $password;
        private $email;
        private $statut;
        private $date_de_creation;

        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
       
        /**
         * Get the value of id_user
         */ 
        public function getId_user()
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         *
         * @return  self
         */ 
        public function setId_user($id_user)
        {
                $this->id_user = $id_user;

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
                return $this->username;
        }

       
    }