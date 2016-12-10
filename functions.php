<?php
    function transferMoney($conn, $money, $receiver){

        $accountSearchQuery = "SELECT * FROM accountinformation WHERE accountNumber = '$receiver'";
        $searchResult =  mysqli_query($conn, $accountSearchQuery);
        $searchRow = mysqli_fetch_array($searchResult, MYSQLI_ASSOC);
        
        if($searchRow){
            $newBalance = $searchRow['balance'] + $money;
            $transferQuery = "UPDATE accountinformation SET balance = $newBalance WHERE accountNumber = '$receiver'";
            $transferResult = mysqli_query($conn, $transferQuery);
            $affectedRow = mysqli_affected_rows($conn);
            if($affectedRow > 0){
                $newUserBalance = $_SESSION['userBalance'] - $money;
                $userAccount = $_SESSION['userAccount'];
                $deductBalanceQuery = "UPDATE accountinformation SET balance = $newUserBalance WHERE accountNumber = '$userAccount'";
                mysqli_query($conn,$deductBalanceQuery);
                
                $_SESSION['userBalance'] = $newUserBalance;
                echo json_encode(array('newUserBalance' => $newUserBalance,'receiverUserName'=> $receiver, 'transferAmount'=> $money));
            }else{
                $_SESSION['transactionMessage'] = "Internal Server error ! Please try again.";
            }
            
        }else{
             $_SESSION['transactionMessage'] = "Cannot find any account associated with Account Number: ". $receiver;
             header("location:welcome.php");
        }
    }
?>