<?php

	//ADMIN PANEL LOGIN PROCESS PAGE

	session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */
	include("../inc/functions-general.php");
		
?>

<?php

	if(!isset($_POST['email']))
	{
		die("Error: Invalid Access");
	}else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rememberme = $_POST['rememberme'];
	}
	
	$members_query = get_users("login_info", "", $email, $password);
	
	//die(mysqli_error($connection));
	$members = mysqli_fetch_assoc($members_query);
	$total = mysqli_num_rows($members_query);
	
	if($total > 0) // type '1' means Administrator
	{
		$_SESSION['member_email'] = $members['email'];
		
		if($rememberme == 'yes')
		{
			setcookie("member_email", $email, time() + 3600 * 12);
		}else{
			setcookie("member_email", $email, time() + 3600);
		}
		
		
			redirect("dashboard.php", "successfully Loged in", "success");
			
		
		
	}else
	{
		redirect("index.php", "Invalid login info ", "error");
	}
	
	
?>
