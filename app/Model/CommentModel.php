<?php

    class CommentModel
    {
        private static int $id = 0;
        private int $tmp_id;
        private ArticleModel $article;
        private int $tmp_id_article;
        private int $tmp_id_account;
        private String $text;
        private bool $deleted = false;
        private bool $active = false;
        private bool $moderated = false;
        private bool $public = true;
        private String $creationDate;
        private String $modificationDate;

        public function __construct(ArticleModel $article, String $text)
        {
            $this->article = $article;
            $this->text = $text;

            self::$id++;
            $this->creationDate = date('m/d/Y h:i:s a', time());
            $this->modificationDate = date('m/d/Y h:i:s a', time());
        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return self::$id;
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
         * Get the value of article
         */ 
        public function getArticle()
        {
                return $this->article;
        }

        /**
         * Set the value of article
         *
         * @return  self
         */ 
        public function setArticle($article)
        {
                $this->article = $article;

                return $this;
        }


        /**
         * Get the value of text
         */ 
        public function getText()
        {   
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
                $this->text = $text;

                return $this;
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
         * Get the value of moderated
         */ 
        public function getModerated()
        {
                return $this->moderated;
        }

        /**
         * Set the value of moderated
         *
         * @return  self
         */ 
        public function setModerated($moderated)
        {
                $this->moderated = $moderated;

                return $this;
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
         * Get the value of creationDate
         */ 
        public function getCreationDate()
        {
                return $this->creationDate;
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
         * Get the value of modificationDate
         */ 
        public function getModificationDate()
        {
                return $this->modificationDate;
        }

        /**
         * Set the value of modificationDate
         *
         * @return  self
         */ 
        public function setModificationDate($modificationDate)
        {
                $this->modificationDate = $modificationDate;

                return $this;
        }

        /**
         * Get the value of tmp_id_article
         */ 
        public function getTmp_id_article()
        {
                return $this->tmp_id_article;
        }

        /**
         * Set the value of tmp_id_article
         *
         * @return  self
         */ 
        public function setTmp_id_article($tmp_id_article)
        {
                $this->tmp_id_article = $tmp_id_article;

                return $this;
        }

        /**
         * Get the value of tmp_id_account
         */ 
        public function getTmp_id_account()
        {
                return $this->tmp_id_account;
        }

        /**
         * Set the value of tmp_id_account
         *
         * @return  self
         */ 
        public function setTmp_id_account($tmp_id_account)
        {
                $this->tmp_id_account = $tmp_id_account;

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