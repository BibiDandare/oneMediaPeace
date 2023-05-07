<?php
    //va chercher le nom prenom et les articles(tableau parce que plusieurs aticle) dans 
    // la base de données, et les passe au modèle
    //require_once $_SERVER['DOCUMENT_ROOT']."/../app/Model/DashboardModel.php";
    require_once "../app/Model/DashboardModel.php";
    require_once "../app/View/DashboardView.php";

    class DashboardController
    {   
        //use Models\DashboardModel;

        public function handle()
        {
            $d = new DashboardModel();
            $d_view = new DashboardView($d);
            $d_view->printView();
        }
    }
    $dashboard = new DashboardController();
    $dashboard->handle();
?>