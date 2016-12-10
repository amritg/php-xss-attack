<?php
    require("config.php");
    // $searchResult = mysqli_query($conn,"SELECT * FROM posts ORDER BY id desc");
    // echo "<table class='table table-striped'>";
    // while($row = mysqli_fetch_assoc($searchResult)){
    //     echo "<tr><td>$row[message_body] - $row[posted_by]</td></tr>";
    // }

    $searchResult = mysqli_query($conn,"SELECT accountinformation.accountHolderFirstName, posts.message_body as post FROM accountinformation
                                LEFT JOIN posts ON accountinformation.id = posts.posted_by");
    echo "<table class='table table-striped'>";
    while($row = mysqli_fetch_assoc($searchResult)){
        echo "<tr><td>$row[post] - $row[accountHolderFirstName]</td></tr>";
    }
?>