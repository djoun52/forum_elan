<?php
    namespace Model;

    use App\AbstractEntity;

    class Message extends AbstractEntity
    {
        private $id_message;
        private $texte;
        private $date_de_creation;


        public function __construct($data){
            parent::hydrate($data, $this);
        }


        /**
         * Get the value of id_message
         */ 
        public function getId_message()
        {
                return $this->id_message;
        }

        /**
         * Set the value of id_message
         *
         * @return  self
         */ 
        public function setId_message($id_message)
        {
                $this->id_message = $id_message;

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
            return $this->texte;
        }
    }