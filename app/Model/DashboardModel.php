<?php
    
    //namespace Models;

    class DashboardModel
    {
        private String $firstName;
        private String $lastName;
        private $articles;

        public function __construct(String $firstName="null", 
                                    String $lastName="null",
                                            $articles="null")
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->articles = $articles;
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
        
        public function getArticles()
        {
            return $this->articles;
        }

        //TODO
        //faire le setter $articles
        //c'est la fonction qui va permettre de modifier un un article, so be carefull
        //le controlleur va surement entrer en jeu car il faut identifier l'article à edit
        //faire ptêtre 2 fonction separer editArticle() et setArticles()
    }
?>