<?php
    require_once "../app/Model/ArticleModel.php";
    require_once "../app/View/ArticleView.php";
    require_once "../app/Model/AccountModel.php";

    class ArticleController
    {
        public function handle()
        {
            if(isset($_SESSION['username']))
            {
                $account = unserialize($_SESSION['currentAccount']);

                $articles = [];

                require_once("../DAO/ArticleSearchDAO.php");

                if(!empty($articles))
                {
                    foreach($articles as $a)
                    {
                        $a_view = new ArticleView($a);
                        $a_view->printView();
                    }
                }
                else
                {
                    echo "Vous n'avez écris aucun article pour le moment ✍️...";
                }
            }
        }
    }

    $article = new ArticleController();
    $article->handle();
?>