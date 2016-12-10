<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ethical Hacking</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Members <span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav nav-sidebar logout">
            <li><a href="logout-script.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
        <h1 class="page-header">Dashboard</h1>
       
        <?php
            echo $_SESSION['userId'];
            echo "<h3>Welcome, ".$_SESSION['userName']."</h3>";
            echo "<h4 id='displayBalance'>Your net balance is: ".$_SESSION['userBalance']."</h4>";
        ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
            <!-- Transfer Money Form -->
            <form class="form-horizontal col-sm-3 col-md-3" id="transferForm">
                <h4>Transfer money quickly!</h4>
                <!--<?php
                    if(!empty($_SESSION['transactionMessage'])){
                        echo $_SESSION['transactionMessage'];
                    }
                ?>-->
                <div id="transferLogMessage">
                </div>
                <div class="form-group">
                    <label for="toAccount" class="col-sm-4 col-md-4">To Account</label>
                    <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="toAccount" id="toAccount">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-4 col-md-4">Amount</label>
                    <div class="col-sm-8 col-md-8">
                        <input type="number" class="form-control" name="amount" id="amount">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <input type="submit" class="form-control" name="submit" id="transferMoneyButton">
                    </div>
                </div>
            </form>
             <!-- Message Board Section -->
             <div class="col-sm-3 col-md-3">
                <form id="messageForm" class="form-inline">
                    <h4>Message Board</h4>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="newMessage" id="newMessage">
                    </div>
                    <button type="submit" name="submitMessage" id="submitMessage" class="btn btn-success">Post</button>
                    <div id="message"></div>
                </form>
                <div id="allPosts" style="margin-top:30px">
                </div>
            </div>
        </div>
      </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#submitMessage").click(function(event){
            event.preventDefault();
            $.ajax({
                url: 'postMessage.php',
                method: 'get',
                data: $("#messageForm").serialize(),
                dataType: "json"})
                .done(function(data){
                    console.log(data);
                    $("#message").show();
                    $("#message").html(data.successMessage);
                    $("#messageForm")[0].reset();
                    setTimeout(function(){
                        $("#message").hide(2200);
                        loadPosts();
                    },500);
                    
                    
                })
                .fail(function(err){
                    console.log(err);
                });
        });

        function loadPosts(){
            $.ajax({
                url: 'loadPosts.php',
                dataType: 'html'})
                .done(function(Result){
                    $("#allPosts").html(Result);
                })
                .fail(function(err){
                    console.log(err);
                });
        }

        loadPosts();

        $("#transferMoneyButton").click(function(event){
            event.preventDefault();
            console.log('transferMoneyButton just Clicked');
            $.ajax({
                url: 'transfer.php',
                method: 'get',
                data: $("#transferForm").serialize(),
                dataType: "json"
            }).success(function(data, textStatus){
                console.log(data);
                console.log(textStatus);
                $("#transferLogMessage").show();
                $("#transferLogMessage").html("<p>SUCCESSFUL TRANSFER OF AMOUNT:" + data.transferAmount + "TO: " + data.receiverUserName);
                setTimeout(function(){
                    $("#transferLogMessage").hide(300);
                    $("#transferForm")[0].reset();
                    setTimeout(function(){
                        $("#displayBalance").html("<h4>Your net balance is: " + data.newUserBalance +"</h4>");
                    },500);
                },1000);
            }).error(function(error){
                console.log(error);
            });

        });
    });
</script>
</body>
</html>