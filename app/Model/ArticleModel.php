<?php
    //namespace Models;

    class ArticleModel
    {
        private String $id;
        private String $firstName; //replace by Account
        private String $lastName; //replace too
        private String $status = "allowed"; //allowed, denied, deleted, banned
        private String $text;
        private $comments;
        private String $title;
        private String $creationDate;
        private String $modificationDate;
        //TODO
        //mettre une date comme attribut
        //à la place de first and last name, mettre un attribut de type Account et remplacer aussi dans le controleur 

        //un article ne peut être écrit que par un user authentifié
        //donc pas de ' =null '

        //réajuster le controlleur selon les nouveau attribut
        public function __construct(String $firstName="user", String $lastName="user", 
                                    String $text="", String $title="userTitle")
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->title = $title;
            $this->text = $text;

            $this->creationDate = date('m/d/Y h:i:s a', time());
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

        public function getStatus()
        {
            return $this->status;
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function getComments()
        {
            return $this->comments;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getCreationDate()
        {
            return $this->creationDate;
        }

        public function getModificationDate()
        {
            if(isset($this->modificationDate))
            {
                return $this->modificationDate;
            }
            else
            {
                return "";
            }
        }

        public function setModificationDate($modificationDate)
        {
            $this->modificationDate = $modificationDate;
        }
    }
?>