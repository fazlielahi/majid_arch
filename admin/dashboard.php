<?php

	//ADMIN PANEL Login PAGE

	session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */
	include("../inc/functions-general.php");
	$dir_images = "../images/";
	
	include("inc-admin/functions.php"); /* functions admin panel */
	authenticate();
?>

<a href="services.php">Services</a>
|
<a href="experience.php">Experience</a>

<p style="text-align:center;  "><?php echo  show_msg() ?></p>