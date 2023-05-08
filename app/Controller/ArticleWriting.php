<div class="articleWritingForm">
    <form action="" method="POST">
        <label for="articleWritingTitle">Titre de l'article :</label><br>
        <input type="text" id="articleWritingTitle" name="articleWritingTitle" required><br>

        <label for="articleWritingText">Contenu de l'article :</label><br>
        <textarea id="articleWritingText" name="articleWritingText" rows="20" cols="100" required></textarea><br>

        <input type="submit" value="Publier">
    </form>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title = $_POST["articleWritingTitle"];
        $content = $_POST["articleWritingText"];
    
        if (empty($title) || empty($content))
        {
            echo "Les champs doivent obligatoire être remplis";
        }
        else
        {
            //create new ArticleModel
            //save in the database, and add to Account articles[]
    
            echo "L'article ".$title." a bien été publié ✅";
        }
    }    
?>