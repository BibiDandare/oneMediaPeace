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
                /*
                $account = new AccountModel($_SESSION['email'], 
                                   $_SESSION['username'],
                                   $_SESSION['password']);
                */

                // aller cherchez tous les articles dans la base de données
                $account = unserialize($_SESSION['currentAccount']);

                $articles = [];

                require_once("../DAO/ArticleSearchDAO.php");

                //print_r($articles);
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

            /*
            else
            {   
                
                $account = new AccountModel("test@test.com", 
                                        "userTest", "useTest");
                

            }
            */
            /*
            $a = new ArticleModel($account, $_POST['articleWritingText'],
                                            $_POST['articleWritingTitle']);
            */
        }
    }

    $article = new ArticleController();
    $article->handle();
?>