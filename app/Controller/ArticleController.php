<?php
    require_once "../app/Model/ArticleModel.php";
    require_once "../app/View/ArticleView.php";

    class ArticleController
    {
        public function handle()
        {
            $a = new ArticleModel();
            $a_view = new ArticleView($a);
            $a_view->printView();
        }
    }

    $article = new ArticleController();
    $article->handle();
?>