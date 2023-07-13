<?php
    require_once("../app/Model/CommentModel.php");

    class CommentController
    {
        public function handle()
        {
            $article = unserialize($_SESSION['currentArticle']);
            //echo $article->getTmp_id();

            $comments = [];

            require_once("../DAO/CommentSearchDAO.php");
            //require_once("../View/CommentView.php");

            //if(empty($comments)){echo "viiiiiiideeeee";}

            foreach ($comments as $comment)
            {

                $content = $comment->getText();
                $creationDate = $comment->getCreationDate();
                /*
                echo "<div class='comment'>";
                //echo "<h3>$username</h3>";
                echo "<p>Date: $creationDate</p>";
                echo "<p class='content' id='content-$id'>$content</p>";
                echo "<a id='show-hide-$id' class='show-hide' onclick='toggleComment($id)'>Show</a>";
                echo "</div>";
                */
                echo $content;
            }
        }
    }

    $c = new CommentController();
    $c->handle();

?>