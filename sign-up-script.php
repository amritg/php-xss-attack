<?php  
	session_start();
	require("config.php");

	if(isset($_POST["register"]) && !empty($_POST["register"])){

		if(!empty($_POST["userFirstName"] && $_POST["userLastName"] && $_POST["accountNumber"] && $_POST["password"])){
			$userFirstName = addslashes($_POST["userFirstName"]);
			$userLastName = addslashes($_POST["userLastName"]);
			$userAccountNumber = addslashes($_POST["accountNumber"]);
			$password = addslashes($_POST["password"]);
			
			$checkAccountNumber = "SELECT accountNumber FROM accountinformation WHERE accountNumber='$userAccountNumber'";

			$result = mysqli_query($conn,$checkAccountNumber);

			$count = mysqli_num_rows($result);
			if($count>=1){
				$message = "Account Number already exists.<br>Please choose another.";
				$_SESSION['message'] = $message;
				header("Location:index.php");
			}
			else{
				mysqli_query($conn,"INSERT INTO accountinformation(accountNumber,password,accountHolderFirstName,accountHolderLastName,balance) VALUES ('$userAccountNumber','$password','$userFirstName','$userLastName', 0)");
				$message = "Register Successfull.<br>You can now Log In.";
				$_SESSION['message'] = $message;
				header("Location:index.php");
			}
		}
		else{
			$message = "REGISTRATION ERROR<br>All fields are required to fill in.";
			$_SESSION['message'] = $message;
			header("Location:index.php");
		}
		mysqli_close($conn);
	}	
?>