<?php
    require_once "../app/Model/ArticleModel.php";
    require_once "../app/View/DashboardView.php";
    require_once "../app/Model/AccountModel.php";

    class DashboardController
    {
        public function handle()
        {
            //$account = unserialize($_SESSION['currentAccount']);

            $articles = [];

            require_once("../DAO/DashboardDAO.php");

            if(!empty($articles))
            {
                foreach($articles as $a)
                {
                    $a_view = new DashboardView($a);
                    $a_view->printView();
                }
            }
            else
            {
                echo "Il n'y a aucun articles disponibles pour le moment ✍️...";
            }
        }
    }

    $article = new DashboardController();
    $article->handle();
?>