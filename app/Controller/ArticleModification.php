<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["modification_articleID"]) && isset($_POST["modification_articleTEXT"]))
        {
            $_SESSION["articleID"] = $_POST["modification_articleID"];
            $_SESSION["articleTEXT"] = $_POST["modification_articleTEXT"];

        }

        $articleID   = $_SESSION["articleID"];
        $articleTEXT = $_SESSION["articleTEXT"];


        echo "<div class='articleWritingForm'>
                <form action='' method='POST'>
                    <label for='articleModificationText'>Contenu de l'article :</label><br>
                    <textarea id='articleModificationText' name='articleModificationText' rows='20' cols='100' required>".$articleTEXT."</textarea><br>
                    <input type='submit' value='Publier'>
                </form>
            </div>";
        
    }
    if(isset($_POST["articleModificationText"]))
    {
        $article_newTEXT = $_POST["articleModificationText"];
        require_once("../DAO/ArticleModificationDAO.php");
    }
?>