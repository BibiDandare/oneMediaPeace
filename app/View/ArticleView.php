<?php
    class ArticleView
    {
        private String $firstName;
        private String $lastName;
        private String $status;
        private String $title;
        private String $text;
        private $comments;
        private String $creationDate;
        private String $modificationDate;

        //passer l'object en paramètre du constructeur
        public function __construct(ArticleModel $article)
        {
            $this->firstName = $article->getFirstName();
            $this->lastName = $article->getLastName();
            $this->text = $article->getText();
            $this->status = $article->getStatus();
            $this->comments = $article->getComments();
            $this->title = $article->getTitle();
            $this->creationDate = $article->getCreationDate();
            $this->modificationDate = $article->getModificationDate();
        }

        public function printView()
        {
            //TOTO
            //ne pas afficher si l'article n'est pas validé par un modérateur
            //le faire dans le controller

            $textExemple = "Les Simpson (The Simpsons) sont une série télévisée
            d'animation américaine1 créée par Matt Groening et diffusée pour la
            première fois à partir du 17 décembre 1989 sur le réseau Fox. En
            2020, elle est diffusée sur Disney+.

            Elle met en scène les Simpson, stéréotype d'une famille de classe
            moyenne américaine2. Leurs aventures servent une satire du mode de
            vie américain. Les membres de la famille, sont Homer, Marge, Bart, 
            Lisa, Maggie, ainsi que Abe, le père d'Homer.
            
            Depuis ses débuts, la série a récolté des dizaines de récompenses,
            dont trente-deux Primetime Emmy Awards, trente Annie Awards et un
            Peabody Award. Le Time Magazine du 31 décembre 1999 l'a désignée
            comme la meilleure série télévisée du xxe siècle et elle a obtenu
            une étoile sur le Hollywood Walk of Fame le 14 janvier 2000. 
            « D'oh! », l'expression d'abattement d'Homer Simpson, est entrée 
            dans la langue anglaise. Ce n'est pas le seul mot à être entré dans
            le dictionnaire anglais, embiggen (« engrandi » en français) est un
            mot inventé par les Simpson qui est aussi entré dans la langue 
            anglaise. L'influence des Simpson s'exerce également sur d'autres 
            sitcoms.";

            switch($this->status)
            {                
                case "allowed":
                    //echo $this->text;
                    echo "<div class='articleDetails'>Title : ".$this->title.", Author : ".$this->firstName.
                    " ".$this->lastName.", Date : " .$this->creationDate."</div>";
                    echo "<div class='articleDisplay'>".$textExemple."</div>";
                    echo "<button class='commentDisplay'>Afficher les commentaires</button>";
                    break;
                case "denied":
                    echo "Cet article ne peut pas être affiché (refusé)";
                    break;
                case "deleted":
                    echo "Cet article à été supprimé";
                    break;
                default:
                    //echo $this->text;
                    echo "Cet article ne peut pas être affiché";
            }
            
        }

        // public function getFirstName()
        // {
        //     return $this->firstName;
        // }

        // public function setFirstName(String $firstName)
        // {
        //     $this->firstName = $firstName;
        // }

        // public function getLastName()
        // {
        //     return $this->firstName;
        // }

        // public function setLastName(String $firstName)
        // {
        //     $this->firstName = $firstName;
        // }

        // public function getText()
        // {
        //     return $this->text;
        // }

        // public function setText(String $text)
        // {
        //     //TODO
        //     //c'est dans le ?Model que se fait la modification d'un article
        //     $this->text = $text;
        // }
    }
?>