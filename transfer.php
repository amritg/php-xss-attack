<?php
    session_start();
    require("config.php");
    require("functions.php");
    
    if (!empty($_GET['toAccount']) && $_GET['amount']){
        $toAccount =  $_GET['toAccount'];
        $amount = $_GET['amount'];

        if($_SESSION['userAccount'] == $toAccount){
            echo json_encode(array('emptyMessage' => "You cannot transfer your own to your own Account"));
        }else{
            if($_SESSION['userBalance'] > 0){
                transferMoney($conn, $amount, $toAccount);
            }else{
                // $_SESSION['transactionMessage'] = "You donot have sufficient balance in your account!";
                echo json_encode(array('emptyMessage' => "You donot have sufficient balance in your account!"));
            }
        }       
    }
    else{
        echo json_encode(array('emptyMessage' => "Please fills in both the form fields !!"));
    }
?>