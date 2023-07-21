<?php
    require_once("../app/Model/CommentModel.php");

    class DashboardView
    {
        private ArticleModel $article;

        public function __construct(ArticleModel $article)
        {
            $this->article = $article;
            
        }

        public function printView()
        {
            $_SESSION['currentArticle'] = serialize($this->article);

            $temporary = $this->article->getTmp_id();
            $temporary_text = $this->article->getText();


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

                if(isset($_SESSION['username']))
                {
                    echo "<button id = 'commentsButton' class=
                    'commentDisplay'>Commenter</button>";
                }
                /*
                echo "<div class='articleUpdate'>";
                echo "<form action='?articleModification' method='POST'>
                <input type='hidden' name='modification_articleID' value='".$temporary."'>
                <input type='hidden' name='modification_articleTEXT' value='".$temporary_text."'>
                <input type='submit' value='Modifier'>
                </form>";
                echo "<button>Supprimer</button>";
                echo "</div>";
                */


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
            
            return;
        }
    }
?>