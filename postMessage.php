<?php
    require("config.php");
    
    if (!empty($_GET['newMessage'])){
        $newMessage =  $_GET['newMessage'];
        $user = "test";
        $_SESSION['newMessage'] = $newMessage;

        $success = mysqli_query($conn,"INSERT INTO posts(message_body,posted_by) VALUES ('$newMessage','$user')");

        if($success){
            echo json_encode(array('successMessage' => "New post is posted successfully!"));
        }else{
            echo json_encode(array('errorMessage' => mysqli_error()));
        }
    }else{
        header("location:index.php");
    }

?>