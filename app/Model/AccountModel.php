<?php
    class AccountModel
    {
        private static int $id = 0;
        private int $tmp_id;
        private String $email;
        private String $password; // dangerous??
        private String $username;
        private String $creationDate;
        //private bool $status; // active / banned
        private bool $banned = false;
        private bool $reported = false;
        private bool $active = false;
        private String $account_rights; //user / administrator / moderator

        public function __construct(String $email="user",
                                 String $username="user",
                                 String $password="user")
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            //$this->status = true;
            $this->account_rights = "ADMIN";
            

            //$this->id++;
            self::$id++;

            $this->creationDate = date('m/d/Y h:i:s a', time());
        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return self::$id;
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

        /**
         * Get the value of banned
         */ 
        public function getBanned()
        {
                return $this->banned;
        }

        /**
         * Set the value of banned
         *
         * @return  self
         */ 
        public function setBanned($banned)
        {
                $this->banned = $banned;

                return $this;
        }

        /**
         * Get the value of reported
         */ 
        public function getReported()
        {
                return $this->reported;
        }

        /**
         * Set the value of reported
         *
         * @return  self
         */ 
        public function setReported($reported)
        {
                $this->reported = $reported;

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
         * Set the value of active
         *
         * @return  self
         */ 
        public function setActive($active)
        {
                $this->active = $active;

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
         * Set the value of account_rights
         *
         * @return  self
         */ 
        public function setAccount_rights($account_rights)
        {
                $this->account_rights = $account_rights;

                return $this;
        }

        /**
         * Get the value of tmp_id
         */ 
        public function getTmp_id()
        {
                return $this->tmp_id;
        }

        /**
         * Set the value of tmp_id
         *
         * @return  self
         */ 
        public function setTmp_id($tmp_id)
        {
                $this->tmp_id = $tmp_id;

                return $this;
        }
    }

?>