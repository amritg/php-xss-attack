<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Form</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</head>
<body>
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="login-tab">Login Form</h3>
		</div><!--.tab-->
		<div class="tabs-content">
			<div class="help-text warning">
				<?php
				if(isset($_SESSION['message'])){
					echo "<p>".$_SESSION['message']."</p>";
				}
			?>
			</div>
			<div id="login-tab-content" class="active">
				<form class="login-form" action="login-script.php" method="post">
					<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Account Number" name="accountNumber">
					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password">
					<input type="submit" class="button" name= "logIn" value="Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p>Never Forget Password</p>
					<p>You will be doomed.</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
</body>
</html>