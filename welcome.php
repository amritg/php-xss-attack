<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/welcomePage.css">
</head>
<body>
    <div class="container">    
      <div class="row">
            <div class="col-sm-9 col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Trusty Bank</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout-script.php">Logout</a></li>
                        </ul>
                        <form class="navbar-form navbar-right">
                            <input type="text" class="form-control" placeholder="Search...">
                        </form>
                    </div>
                </nav>
                <div class="row">
                    <!-- Transfer Money Form -->
                    <div class="col-sm-7 col-md-7 moneyTransferForm">               
                        <form class="form-horizontal" id="transferForm">
                            <h4 id="moneyTransferFormHeading">TRANSFER MONEY</h4>
                            <!-- Log Server message-->
                            <div id="transferLogMessage">
                            </div>
                            <div class="form-group">
                                <label for="toAccount" class="col-sm-4 col-md-4">To Account</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" name="toAccount" id="toAccount" placeholder="User Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="col-sm-4 col-md-4">Amount</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount In Euro's">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 col-md-3 col-md-push-9">
                                    <input type="submit" class="btn btn-primary form-control" name="submit" id="transferMoneyButton">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Account Information -->
                    <div class="col-sm-4 col-md-4 col-md-push-1 accountInformation">
                        <h4>User Profile</h4><hr/>
                        <p>Account Holder's Name : <?php echo $_SESSION['userFirstName']." ".$_SESSION['userLastName']; ?></p>
                        <p id="displayBalance">NET BALANCE : € <?php echo $_SESSION['userBalance']; ?></p>
                    </div>         
                </div>
                <div class="row">
                    <!-- Message Board Section -->
                    <div class="col-sm-7 col-md-7 messageBoard">
                        <form id="messageForm" class="form-inline">
                            <h4>Suggestions Forum</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="newMessage" id="newMessage" placeholder="Any Suggestions">
                            </div>
                            <button type="submit" name="submitMessage" id="submitMessage" class="btn btn-success">Post</button>
                            <!-- Log Server message-->
                            <div id="message"></div>
                        </form>
                        <div id="allPosts" style="margin-top:30px">
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</body>
</html>