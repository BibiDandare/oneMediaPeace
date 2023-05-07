<?php
    //namespace Models;

    class ArticleModel
    {
        private String $firstName;
        private String $lastName;
        private String $status;
        //allowed, denied, deleted, banned
        private String $text;
        //TODO
        //mettre une date comme attribut
        //à la place de first and last name, mettre un attribut de type Person

        //un article ne peut être écrit que par un user authentifié
        //donc pas de ' =null '
        public function __construct(String $firstName, String $lastName, 
                                    String $text, String $status="allow")
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->text = $text;
        }

        public function getFirstName()
        {
            return $this->firstName;
        }

        public function setFirstName(String $firstName)
        {
            $this->firstName = $firstName;
        }

        public function getLastName()
        {
            return $this->firstName;
        }

        public function setLastName(String $firstName)
        {
            $this->firstName = $firstName;
        }

        public function getText()
        {
            return $this->text;
        }

        public function setText(String $text)
        {
            //TODO
            //c'est dans le ?Model que se fait la modification d'un article
            $this->text = $text;
        }
    }
?>