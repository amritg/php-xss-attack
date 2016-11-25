<?php
    session_start();
    require("config.php");
    if(isset($_POST["accountNumber"]) && !empty($_POST["logIn"])){

        if(!empty($_POST["accountNumber"] && $_POST["password"])){
            $logUser = $_POST["accountNumber"];
            $logPassword = $_POST["password"];

            $checkLogIn = "SELECT * FROM accountinformation WHERE accountNumber ='$logUser' AND password='$logPassword'";
            
            $logValues = mysqli_query($conn,$checkLogIn);
            $row = mysqli_fetch_array($logValues, MYSQLI_ASSOC);

            $logFirstName = $row["accountHolderFirstName"];
            $logLastName = $row["accountHolderLastName"];

            if($row){
                $_SESSION['userName'] = $logFirstName;
                header("Location:welcome.php");
            }else{
                $message = "LOG IN ERROR<br>Account Number or Password mismatch Type Account and Password correctly.";
                $_SESSION['message'] = $message;

                header("Location:index.php");
            }
        }else{
            $message = "LOG IN ERROR<br>Please provide both Account Number and Password.";
            $_SESSION['message'] = $message;
            header("Location:index.php");
        }
        mysqli_close($conn);
    }

?>