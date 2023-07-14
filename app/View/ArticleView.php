<?php
    require_once("../app/Model/CommentModel.php");

    class ArticleView
    {
        /*
        private String $firstName;
        private String $lastName;
        private String $status;
        private String $title;
        private String $text;
        private $comments;
        private String $creationDate;
        private String $modificationDate;
        */
        private ArticleModel $article;

        //passer l'object en paramètre du constructeur
        public function __construct(ArticleModel $article)
        {
            $this->article = $article;
            
        }

        public function printView()
        {
            //TOTO
            //ne pas afficher si l'article n'est pas validé par un modérateur
            //le faire dans le controller

            $_SESSION['currentArticle'] = serialize($this->article);

            $textExemple = "Les Simpson (The Simpsons) sont une série télévisée
            d'animation américaine1 créée par Matt Groening et diffusée pour la
            première fois à partir du 17 décembre 1989 sur le réseau Fox. En
            2020, elle est diffusée sur Disney+.

            Elle met en scène les Simpson, stéréotype d'une famille de classe
            moyenne américaine2. Leurs aventures servent une satire du mode de
            vie américain. Les membres de la famille, sont Homer, Marge, Bart, 
            Lisa, Maggie, ainsi que Abe, le père d'Homer.
            
            Depuis ses débuts, la série a récolté des dizaines de récompenses,
            dont trente-deux Primetime Emmy Awards, trente Annie Awards et un
            Peabody Award. Le Time Magazine du 31 décembre 1999 l'a désignée
            comme la meilleure série télévisée du xxe siècle et elle a obtenu
            une étoile sur le Hollywood Walk of Fame le 14 janvier 2000. 
            « D'oh! », l'expression d'abattement d'Homer Simpson, est entrée 
            dans la langue anglaise. Ce n'est pas le seul mot à être entré dans
            le dictionnaire anglais, embiggen (« engrandi » en français) est un
            mot inventé par les Simpson qui est aussi entré dans la langue 
            anglaise. L'influence des Simpson s'exerce également sur d'autres 
            sitcoms.";

            //switch($this->status)
            // {                
                //case "allowed":
            if(!$this->article->getDeleted() && !$this->article->getModerated())
            {
                //echo $this->text;
                echo "<div class='articleDetails'>Title : "
                .$this->article->getTitle().
                ", Author : ".$this->article->getAccount()->getUsername()." ".
                ", Date : " .$this->article->getCreationDate()."</div>";

                echo "<div class='articleDisplay'>".$this->article->getText()."</div>";

                echo "<button id = 'commentsDiplayButton' class=
                'comment'><a href='?comment'>Afficher les commentaires</a>";
                echo "<div id='commentDiv' class='commentDiv'>";
                //require_once("../app/Controller/CommentController.php");
                echo "</div></button>";

                echo "<button id = 'commentsButton' class=
                'commentDisplay'>Commenter</button>";

                echo "<div class='commentForm'>
                <form action='?commentWriting' method='POST'>
                        <textarea name='commentWritingText' placeholder='Ajouter un commentaire'></textarea>
                        <input class='submitComment' type='submit' value='publier'>
                </form>
                     </div>";
                //faire une classe CommentWriting qui va réceptionner le formulaire, puis appeler
                //CommentRegisterDAO.php
                //require_once("../Controller/CommentWriting.php");

            }
            /*
            else if(!$this->article->getDeleted() && !$this->article->getModerated())
            {
                echo "Cet article est privé, veuillez vous connecté pour le voir";
            }
            */
            else if($this->article->getModerated())
            {
                echo "Cet article ne peut pas être affiché (refusé)";
            }
            else if($this->article->getDeleted())
            {
                echo "Cet article à été supprimé";
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