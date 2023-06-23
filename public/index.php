<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <title>OneMediaPeace</title>
    </head>

    <body>
        <header>
            <a href="/">
                <img class="logo" src="pictures/logo_320.png" alt="logo">
            </a>

            <h1 class="headerTitle">
                OneMediaPeace
            </h1>
        </header>
        <main>

            <div class="navigation">
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo ""; //doit montrer le boutton se déconnecter,
                                 // et montrer le nom de la personne connecter
                    }
                    else
                    {
                        echo " <div class='notLogged'>
                                    <div class='signInButton'>
                                        <a href='?sign-in'>Sign in</a>
                                    </div>
                                    <div class='signUpButton'>
                                        <a href='?sign-up'>Sign up</a>
                                    </div>
                                </div>";
                               
                    }
                 ?>
                <nav>
                    <!-- faire des if pour rajouter certain trucs selon le type
                    de compte -->
                    <ul>
                        <li>
                            <a href="/">
                                Tableau de bord
                            </a>
                        </li>
                        <li>
                            <!-- redirect to the dynamic dashboard -->
                            <a href="?articles">
                                <?php 
                                    if(isset($_SESSION['signInUsername']))
                                    {
                                        echo "<span>Mes </span>";
                                    }
                                ?>
                                Articles
                            </a>
                        </li>
                        <?php
                            if(isset($_SESSION['signInUsername']))
                            {
                                echo "<li>
                                        <a href='?articleWriting'>
                                            Écrire un article
                                        </a>
                                    </li>";
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['signInUsername']))
                            {
                                echo "<li>
                                        <a>
                                            Paramètres du compte
                                        </a>
                                    </li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="content">
                <?php
                    //require_once "..app/Model/DashboardModel.php";
                    
                    //catching the url
                    
                    $requestUri = $_SERVER['REQUEST_URI'];
                    
                    if(isset(explode('?', $_SERVER['REQUEST_URI'], 2)[1]))
                    {
                        $url = explode('?', $_SERVER['REQUEST_URI'], 2)[1];
                    }
                    else
                    {
                        $url = "";
                    }
                    
                    //redirection toward the right page
                    $routes = array(
                             '' => "../app/Controller/DashboardController.php",
                      "sign-in" => "../app/Controller/Login.php",
                      "sign-up" => "../app/Controller/Inscription.php",
                    "dashboard" => "../app/Controller/DashboardController.php",
                    "articleWriting" => "../app/Controller/ArticleWriting.php",
                     "articles" => "../app/Controller/ArticleController.php"
                    );

                    if (array_key_exists($url, $routes))
                    {
                        require_once $routes[$url];
                    }
                    else 
                    {
                        // require '404.php';
                        header("HTTP/1.0 404 Not Found");
                        echo "Désolé, la page que vous recherchez est 
                        introuvable.";
                    }
                ?>
            </div>
        </main>
        <footer>
            <p class="footer">
            Copyright &copy; <time datetime="2023">2023</time>
            - Made by Biram HABIBOULAYE DAN DARE for <a href="">ESGI School</a>
            - <a class="link" href=""> Mentions légales</a>
            <br>
            Contact:<a class="mail" href="mailto:bhabiboulayedandare@myges.fr">
            bhabiboulayedandare@myges.fr</a>
            </p>
        </footer>
    </body>
</html>
