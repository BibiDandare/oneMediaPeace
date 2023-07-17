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
            //TODO
            //ne pas afficher si l'article n'est pas validé par un modérateur
            //le faire dans le controller
            /*
            if (!isset($_SESSION['currentArticle']))
            {
                $_SESSION['currentArticle'] = array();
            }
            */

            $_SESSION['currentArticle'] = serialize($this->article);

            $temporary = $this->article->getTmp_id();
            $temporary_text = $this->article->getText();


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

                echo "<button id='commentsDiplayButton' class=
                'comment'>Afficher les commentaires</button>";

                echo "<button id = 'commentsButton' class=
                'commentDisplay'>Commenter</button>";
                
                echo "<div class='articleUpdate'>";
                echo "<form action='?articleModification' method='POST'>
                <input type='hidden' name='modification_articleID' value='".$temporary."'>
                <input type='hidden' name='modification_articleTEXT' value='".$temporary_text."'>
                <input type='submit' value='Modifier'>
                </form>";
                echo "<button>Supprimer</button>";
                echo "</div>";


                echo "<div class='commentForm'>
                    <form action='?commentWriting' method='POST'>
                        <input type='hidden' name='articleID' value='".$temporary."'>
                        <textarea name='commentWritingText' placeholder='Ajouter un commentaire'></textarea>
                        <input class='submitComment' type='submit' value='publier'>
                    </form>
                     </div>";
                

                echo "<div id='commentDiv' class='commentDiv'>";
                include_once("../app/Controller/CommentController.php");
                executeCommentController();
                echo "</div>";
                echo "<br><br>";

                
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

            //exit();
            //quit();
            return;
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