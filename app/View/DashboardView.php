<!-- <div class="user_name">

    //php balise
        // if ($this->getFirstName() != null && $this->getLastName() != null)
        // {
        //     echo "Logged as "."<b>".$this->getFirstName().' '.$this->getLastName()."</b>";
        // }
    //php balise
</div> -->

<div>
    <?php

        class DashboardView
        {
            private $articles;
            
            public function __construct(DashboardModel $dasboard)
            {
                $this->articles = $dasboard->getArticles();
            }

            // public function printUser()
            // {
            //     echo "<div class=user_name>";
            //         if ($this->firstName != null && $this->lastName != null)
            //         {
            //             echo "Logged as "."<b>".$this->firstName.' '.$this->lastName."</b>";
            //         }
            //     echo "</div>";
            // }                

            public function printView()
            {
                // foreach($this->articles as $article)
                // {
                //     $article->printView();
                // } 
                echo "dashboard view";
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
        }

    ?>
</div>