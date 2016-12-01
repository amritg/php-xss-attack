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
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item 1</a></li>
            <li><a href="">Nav item 2</a></li>
            <li><a href="">Nav item 3</a></li>
            <li><a href="">Nav item 4</a></li>
            <li><a href="">Nav item 5</a></li>
          </ul>
          <ul class="nav nav-sidebar logout">
            <li><a href="logout-script.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
        <h1 class="page-header">Dashboard</h1>
        <?php
            echo "<h3>Welcome, ".$_SESSION['userName']."</h3>";
            echo "<h4>Your net balance is: ".$_SESSION['userBalance']."</h4>";
            
        ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
            
            <form class="form-horizontal col-sm-3 col-md-3" action="transfer.php" method="get">
                <h4>Transfer money quickly!</h4>
                <?php
                    if(!empty($_SESSION['transactionMessage'])){
                        echo $_SESSION['transactionMessage'];
                    }
                ?>
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
                        <input type="submit" class="form-control" name="submit" id="submit">
                    </div>
                </div>
            </form>
            
        </div>
      </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>