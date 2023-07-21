<?php
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'biram';
    $password = 'biramdb';

    try
    {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $newModificationDate = date('m/d/Y h:i:s a', time());

        $date_1 = DateTime::createFromFormat('m/d/Y h:i:s a', $newModificationDate);
        $date_2 = $date_1->format('Y-m-d H:i:s');

        $query = "UPDATE Article SET content = :newContent, modification_date = :newModificationDate WHERE id = :articleID";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':newContent', $article_newTEXT);
        $stmt->bindValue(':newModificationDate', $date_2);
        $stmt->bindValue(':articleID', $articleID, PDO::PARAM_INT);
        $stmt->execute();

        echo "L'article a été mis à jour avec succès.";
        
        sleep(2);

            echo "
            <script>
                window.location.href = 'http://biram.c2lr.eu/?articles';
            </script>
            ";
    }
    catch (PDOException $e)
    {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
?>
