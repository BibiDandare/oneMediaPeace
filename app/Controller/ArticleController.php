<?php
    require_once "../app/Model/ArticleModel.php";
    require_once "../app/View/ArticleView.php";
    require_once "../app/Model/AccountModel.php";

    class ArticleController
    {
        public function handle()
        {
            if(isset($_SESSION['signInUsername']) && isset($_SESSION['email'])
                     && isset($_SESSION['signInPassword']))
            {
                $account = new AccountModel($_SESSION['email'], 
                                   $_SESSION['signInUsername'],
                                   $_SESSION['signInPassword']);
            }
            else
            {
                $account = new AccountModel("biramdandare@icloud.com", 
                                        "bibi", "bibi");
            }

            $a = new ArticleModel($account);
            $a_view = new ArticleView($a);
            $a_view->printView();
        }
    }

    $article = new ArticleController();
    $article->handle();
?>