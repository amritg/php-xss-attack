<?php 
	session_start();
	if (isset($_SESSION["userName"])) {
    	unset($_SESSION["userName"]);
    	unset($_SESSION["message"]);
		setcookie("PHPSESSID","",time()-1000,"/");
	}
	// else {
    // 	echo "don't see one";
	// }
	// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Form</title>
    <link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</head>
<body>
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a href="#signup-tab-content">Sign Up</a></h3>
			<h3 class="login-tab"><a class="active" href="#login-tab-content">Log In</a></h3>
		</div><!--.tab-->
		<div class="tabs-content">
			<h2 style="text-align:center;padding-bottom:15px">Trusty Bank <i class="fa fa-money" aria-hidden="true"></i></h2>
			<div class="help-text warning">
				<?php
				if(isset($_SESSION['message'])){
					echo "<p>".$_SESSION['message']."</p>";
				}
			?>
			</div>
			<div id="signup-tab-content">
				<form class="signup-form" action="sign-up-script.php" method="post">
					<input type="text" class="input" id="user_first_name" autocomplete="off" placeholder="First name" name="userFirstName" required>
					<input type="text" class="input" id="user_last_name" autocomplete="off" placeholder="Last name" name="userLastName" required>
					<input type="number" class="input" id="user_account_number" autocomplete="off" placeholder="Account Number" name="accountNumber" required>
					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password" required>
					<input type="submit" class="button" name = "register" value="Sign Up">
				</form>
				<div class="help-text">
					<p>By signing up, you agree to the</p>
					<p style="text-decoration:underline;"><a href="http://pdf.textfiles.com/security/palmer.pdf" target="_blank">Terms of service Ethical Hacking</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->
			<div id="login-tab-content" class="active">
				<form class="login-form" action="login-script.php" method="post">
					<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Account Number" name="accountNumber">
					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password">
					<input type="submit" class="button" name= "logIn" value="Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p>Your Security. Our Concern</p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
</body>
</html>