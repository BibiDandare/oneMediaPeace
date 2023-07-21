<?php
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'biram';
    $password = 'biramdb';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM Article WHERE id = :articleId";
        $query_1 = $db->prepare($query);
        $query_1->bindParam(':articleId', $article_reference, PDO::PARAM_INT);
        $query_1->execute();

        if ($query_1->rowCount() > 0)
        {
            echo "L'article a été supprimé avec succès.";

            sleep(2);

            echo "
            <script>
                window.location.href = 'http://biram.c2lr.eu/?articles';
            </script>
            ";
        }
        else
        {
            echo "Impossible de trouver l'article à supprimer.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
?>
