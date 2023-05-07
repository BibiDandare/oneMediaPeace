<?php
    class ArticleView
    {
        private String $firstName;
        private String $lastName;
        private String $status;
        private String $text;

        //passer l'object en paramètre du constructeur
        public function __construct(String $firstName, String $lastName, 
                                                           String $text)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->text = $text;
        }

        public function printView()
        {
            //TOTO
            //ne pas afficher si l'article n'est pas validé par un modérateur
            //le faire dans le controller
            switch($this->status)
            {
                case "allowed":
                    echo $this->text;
                    break;
                case "denied":
                    //TODO
                    break;
                case "deleted":
                    //TODO
                    break;
                case "banned":
                    //TODO
                    break;
            }
            
        }

        // public function getFirstName()
        // {
        //     return $this->firstName;
        // }

        // public function setFirstName(String $firstName)
        // {
        //     $this->firstName = $firstName;
        // }

        // public function getLastName()
        // {
        //     return $this->firstName;
        // }

        // public function setLastName(String $firstName)
        // {
        //     $this->firstName = $firstName;
        // }

        // public function getText()
        // {
        //     return $this->text;
        // }

        // public function setText(String $text)
        // {
        //     //TODO
        //     //c'est dans le ?Model que se fait la modification d'un article
        //     $this->text = $text;
        // }
    }
?>