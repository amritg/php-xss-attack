<?php
    require("config.php");
    $searchResult = mysqli_query($conn,"SELECT accountinformation.accountHolderFirstName, posts.created_at, posts.message_body as post FROM accountinformation
                                INNER JOIN posts ON accountinformation.id = posts.posted_by ORDER BY posts.created_at DESC");
    echo "<table class='table table-striped'>";
    while($row = mysqli_fetch_assoc($searchResult)){
        echo "<tr><td>$row[post] - $row[accountHolderFirstName] ($row[created_at])</td></tr>";
    }
?>