<?php
    
    //namespace Models;

    class DashboardModel
    {
        private $articles;

        public function __construct($articles="null")
        {
            $this->articles = $articles;
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