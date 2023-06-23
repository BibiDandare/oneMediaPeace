<?php

    require_once "../app/Model/AccountModel.php";
    //echo "here";

    class AccountController
    {
        public function handle()
        {
            $account = new AccountModel($_POST['email'],
                               $_POST['signInPassword'], 
                              $_POST['signInUsername']);

            require_once "../DAO/AccountDAO.php";
            
        }

    }

    $account = new AccountController();
    $account->handle();
   
?>