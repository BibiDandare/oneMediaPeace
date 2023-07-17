<?php
    require_once("../app/Model/CommentModel.php");
    require_once("../app/Model/ArticleModel.php");
    require_once("../app/Model/AccountModel.php");



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $content = $_POST["commentWritingText"];
        $article = unserialize($_SESSION['currentArticle']);
        $articleID = $_POST["articleID"];

        if (empty($content))
        {
            echo "Les champs doivent obligatoire être remplis";
        }
        else
        {
            $comment = new CommentModel($article, 
                        $_POST['commentWritingText']);
           //$comment->setTmp_id_article($article->getTmp_id());
            $comment->setTmp_id_article($articleID);
            $comment->setTmp_id_account($article->getAccount()->getTmp_id());

            require_once("../DAO/CommentRegisterDAO.php");


            //echo $comment->getTmp_id_account();

            //require_once("ArticleController.php");
            //save in the database, and add to Account articles[]

            echo "Votre commentaire a bien été publié ✅";
        }
    }

?>