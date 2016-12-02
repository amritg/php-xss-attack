<?php
    require("config.php");
    $searchResult = mysqli_query($conn,"SELECT * FROM posts ORDER BY id desc");
    echo "<table class='table table-striped'>";
    while($row = mysqli_fetch_assoc($searchResult)){
        echo "<tr><td>$row[message_body] - $row[posted_by]</td></tr>";
    }
?>