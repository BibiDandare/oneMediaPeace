<?php
    //namespace Models;

    class ArticleModel
    {
        private static int $id = 0;
        private int $tpm_id;
       // private String $firstName; //replace by Account
        //private String $lastName; //replace too
        private AccountModel $account;
        //private String $status = "allowed"; //allowed, denied, deleted, banned
        private bool $deleted = false;
        private bool $active = false;
        private bool $moderated = false;
        private bool $public = true;
        private String $text;
        private $comments;
        private String $title;
        private String $creationDate;
        private String $modificationDate = "";
        //TODO
        //mettre une date comme attribut
        //à la place de first and last name, mettre un attribut de type Account et remplacer aussi dans le controleur 

        //un article ne peut être écrit que par un user authentifié
        //donc pas de ' =null '

        //réajuster le controlleur selon les nouveau attribut
        /*
        public function __construct(String $firstName="user", String $lastName="user", 
                                    String $text="", String $title="userTitle")
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->title = $title;
            $this->text = $text;

            $this->creationDate = date('m/d/Y h:i:s a', time());
        }
        */
        public function __construct(AccountModel $account, String $text="", 
                                                String $title="userTitle")
        {
            $this->account = $account;
            $this->title = $title;
            $this->text = $text;

            self::$id++;
            $this->creationDate = date('m/d/Y h:i:s a', time());
            $this->modificationDate = date('m/d/Y h:i:s a', time());

        }
        /*
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
        */

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
        /*
        public function setStatus($status)
        {
            $this->status = $status;
        }
        */
        public function getComments()
        {
            return $this->comments;
        }

        public function getId()
        {
            return self::$id;
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

        /**
         * Get the value of deleted
         */ 
        public function getDeleted()
        {
            return $this->deleted;
        }

        /**
         * Set the value of deleted
         *
         * @return  self
         */ 
        public function setDeleted($deleted)
        {
            $this->deleted = $deleted;

            return $this;
        }

        /**
         * Get the value of active
         */ 
        public function getActive()
        {
                return $this->active;
        }


        /**
         * Get the value of modarated
         */ 
        public function getModerated()
        {
                return $this->moderated;
        }

        /**
         * Set the value of modareted
         *
         * @return  self
         */ 
        public function setModerated($moderated)
        {
                $this->moderated = $moderated;

                return $this;
        }

        /**
         * Get the value of account
         */ 
        public function getAccount()
        {
                return $this->account;
        }

        /**
         * Get the value of public
         */ 
        public function getPublic()
        {
                return $this->public;
        }

        /**
         * Set the value of public
         *
         * @return  self
         */ 
        public function setPublic($public)
        {
                $this->public = $public;

                return $this;
        }

        /**
         * Get the value of tpm_id
         */ 
        public function getTpm_id()
        {
                return $this->tpm_id;
        }

        /**
         * Set the value of tpm_id
         *
         * @return  self
         */ 
        public function setTpm_id($tpm_id)
        {
                $this->tpm_id = $tpm_id;

                return $this;
        }

        /**
         * Set the value of creationDate
         *
         * @return  self
         */ 
        public function setCreationDate($creationDate)
        {
                $this->creationDate = $creationDate;

                return $this;
        }

        /**
         * Set the value of active
         *
         * @return  self
         */ 
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    }
?>