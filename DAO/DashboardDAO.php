<?php
    $dsn = 'mysql:host=localhost;dbname=esgi';
    $username = 'biram';
    $password = 'biramdb';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM Account";
        $queryAccounts = $db->query($query);
        $accounts = $queryAccounts->fetchAll(PDO::FETCH_ASSOC);

        foreach ($accounts as $account)
        {
            $accountId = $account['id'];

            $current_account = new AccountModel($account['email'], 
                                            $account['username'],
                                            $account['account_password']);
            $current_account->setTmp_id($account['id']);

            $query = "SELECT * FROM Article WHERE account_id = $accountId";
            $queryArticles = $db->query($query);
            $articlesData = $queryArticles->fetchAll(PDO::FETCH_ASSOC);

            foreach ($articlesData as $articleData)
            {
                $id = $articleData['id'];
                $title = $articleData['title'];
                $content = $articleData['content'];
                $creationDate = $articleData['creation_date'];
                $modificationDate = $articleData['modification_date'];
                $moderated = $articleData['moderated'];
                $deleted = $articleData['deleted'];
                $public = $articleData['public'];
                $active = $articleData['active'];

                $article = new ArticleModel($current_account, $content, $title);
                $article->setTmp_id($id);
                $article->setCreationDate($creationDate);
                $article->setModificationDate($modificationDate);
                $article->setModerated($moderated);
                $article->setDeleted($deleted);
                $article->setPublic($public);
                $article->setActive($active);

                array_push($articles, $article);
            }
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
?>
