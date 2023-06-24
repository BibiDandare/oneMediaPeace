<?php
    //session_start();

    require_once "../app/Model/AccountModel.php";
    //echo "here";

    class AccountController
    {
        public function handle()
        {
            $account = new AccountModel($_POST['signInEmail'],
                               $_POST['signInPassword'], 
                              $_POST['signInUsername']);

            
            require_once "../DAO/InscriptionDAO.php";
            
        }

    }

    $account = new AccountController();
    $account->handle();
   
?>