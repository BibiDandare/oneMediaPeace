<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $article_reference = $_POST['deleting_articleID'];

        require_once('../DAO/ArticleDeleteDAO.php');
        
    }
    
?>