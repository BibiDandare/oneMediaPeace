<?php
    class AccountModel
    {
        private static int $id;
        private String $email;
        private String $password; // dangerous??
        private String $username;
        private String $creationDate;
        private bool $status; // active / banned
        private String $account_rights; //user / administrator / moderator

        public function __construct(String $email, String $password,
                                    String $username)
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->status = true;
            $this->account_rights = "ADMIN";
            

            //$this->id++;
            self::id++;

            $this->creationDate = date('m/d/Y h:i:s a', time());
        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Get the value of creationDate
         */ 
        public function getCreationDate()
        {
            return $this->creationDate;
        }

        /**
         * Get the value of account_rights
         */ 
        public function getAccount_rights()
        {
            return $this->account_rights;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Get the value of status
         */ 
    }

?>