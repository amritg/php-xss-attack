<?php
    session_start();
    require("config.php");
    if (!empty($_GET['newMessage'])){
        $newMessage =  $_GET['newMessage'];
        $userId = $_SESSION['userId'];
        $success = mysqli_query($conn,"INSERT INTO posts(message_body,posted_by) VALUES ('$newMessage','$userId')");

        if($success){
            echo json_encode(array('successMessage' => "New post is posted successfully!"));
        }else{
            // echo json_encode(array('errorMessage' => mysqli_error()));
            echo mysqli_error();
        }
    }else{
        echo json_encode(array('emptyMessage' => "Please fill in the form field!!"));
    }

?>