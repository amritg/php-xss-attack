<?php
    session_start();
    require("config.php");
    require("functions.php");

    // if(!isset($_GET["submit"])){
    //     header("location:index.php");
    // }else{
        if (!empty($_GET['toAccount']) && $_GET['amount']){
            $toAccount =  $_GET['toAccount'];
            $amount = $_GET['amount'];

            if($_SESSION['userBalance'] > 0){
                transferMoney($conn, $amount, $toAccount);
            }else{
                $_SESSION['transactionMessage'] = "You donot have sufficient balance in your account!";
            }
        }
            // header("location:welcome.php");
    //     }else{
    //         // header("location:welcome.php");
    //     }
        
    // }


?>