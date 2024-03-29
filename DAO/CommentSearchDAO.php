<?php
    //echo "connexion réussie";
    //require_once("../app/Model/CommentModel.php");
    function executeCommentSearchDAO($article)
    {
        $dsn = 'mysql:host=localhost;dbname=esgi';
        $username = 'biram';
        $password = 'biramdb';

        $number = $article->getTmp_id();
        $comments = [];

        try
        {
            $db = new PDO($dsn, $username, $password);

            //$query = $db->prepare("SELECT * FROM Comment WHERE article_id = :articleId");
            //$query->bindValue(':articleId', $number, PDO::PARAM_INT);

            $query = "SELECT * FROM Comment WHERE article_id = $number";
            $query_1 = $db->query($query);

            if ($query_1->rowCount() > 0)
            {
                $comments_1 = $query_1->fetchAll(PDO::FETCH_ASSOC);

                foreach ($comments_1 as $comment)
                {
                    $id = $comment['id'];
                    $accountId = $comment['account_id'];
                    $articleId = $comment['article_id'];
                    $content = $comment['content'];
                    $creationDate = $comment['creation_date'];
                    $modificationDate = $comment['modification_date'];
                    $moderated = $comment['moderated'];
                    $deleted = $comment['deleted'];
                    $public = $comment['public'];
                    $active = $comment['active'];

                    $my_comment = new CommentModel($article, $content);
                    $my_comment->setTmp_id_account($article->getAccount()->getTmp_id());
                    $my_comment->setTmp_id_article($article->getTmp_id());
                    $my_comment->setCreationDate($creationDate);
                    $my_comment->setModificationDate($modificationDate);
                    $my_comment->setModerated($moderated);
                    $my_comment->setDeleted($deleted);
                    $my_comment->setPublic($public);
                    $my_comment->setActive($active);

                    array_push($comments, $my_comment);
                }
            }
        }
        catch(PDOException $e)
        {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }

        return $comments;
    }


?>
