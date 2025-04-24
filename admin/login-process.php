<?php

    session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */

    if(!isset($_POST['email']))
	{
		die("Error: Invalid Access");
	}else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$rememberme = $_POST['rememberme'];
	}
	
	$users_query = get_users("login_info", "", $email, $password);
	
	//die(mysqli_error($connection));
	$users = mysqli_fetch_assoc($users_query);
	$total = mysqli_num_rows($users_query);
	
	if($total > 0) 
	{
		$_SESSION['member_email'] = $users['email'];
		//$_SESSION['member_id'] = $users['id'];
		
		/*if($rememberme == 'yes')
		{
			setcookie("member_id", $email, time() + 3600 * 12);
		}else{
			setcookie("member_id", $email, time() + 3600);
		}*/
		
		// if($users['role'] == 1) // 1 defines Administrator
		// {
			//redirect("admin/dashboard.php", "successfully Loged in", "success");
            header("location: dashboard.php?msg=you are loged in");
			
		// }else if($users['role'] == 0) // 1 defines Reporter
		// {
		// 	redirect("reporter/news.php", "successfully Loged in", "success");
		// }
		
	}else
	{
		// redirect("index.php", "Invalid login info ", "error");
        header("location: login.php?msg=Error: Invalid login info");
	}
	
	
?>
