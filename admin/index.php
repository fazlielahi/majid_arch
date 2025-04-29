<?php

	//ADMIN PANEL Login PAGE

	session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */
	include("../inc/functions-general.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Page Title -->
  <title>Login | Mian Majid Khan Architecture Studio</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Securely log in to your account at Mian Majid Khan Architecture Studio to access project dashboards, documents, and more." />
  <meta name="keywords" content="login, architecture studio, user account, secure login" />
  <meta name="author" content="Mian Majid Khan Architecture Studio" />
  <meta name="robots" content="noindex, nofollow">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.yourdomain.com/login.php">

  <!-- Favicons & Touch Icons -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <meta name="theme-color" content="#377f4a">

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Login | Mian Majid Khan Architecture Studio">
  <meta property="og:description" content="Access your account at Mian Majid Khan Architecture Studio for project management and updates.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.yourdomain.com/login.php">
  <meta property="og:image" content="https://www.yourdomain.com/assets/og-login.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Login | Mian Majid Khan Architecture Studio">
  <meta name="twitter:description" content="Access your account at Mian Majid Khan Architecture Studio for project management and updates.">
  <meta name="twitter:image" content="https://www.yourdomain.com/assets/twitter-login.jpg">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Login",
    "url": "https://www.yourdomain.com/login.php",
    "description": "Secure login page for Mian Majid Khan Architecture Studio."
  }
  </script>

  <!-- Your Original Styles -->
  <style>
    /* General Styles */
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f7fc;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    /* Login Container */
    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 100%;
      max-width: 400px;
      position: relative;
      padding-top: 10px;
    }
    /* Form Title */
    h2 {
      margin-bottom: 10px;
      font-size: 24px;
      color: #333;
    }
    p {
      margin-bottom: 20px;
      color: #666;
    }
    /* Input Groups */
    .input-group {
      margin-bottom: 15px;
      text-align: left;
    }
    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
      color: #555;
    }
    input {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      transition: border 0.3s ease-in-out;
    }
    input:focus {
      border-color: #007bff;
    }
    /* Password Wrapper */
    .password-wrapper {
      display: flex;
      align-items: center;
      position: relative;
    }
    .password-wrapper input {
      flex: 1;
    }
    .toggle-password {
      position: absolute;
      right: 10px;
      cursor: pointer;
      font-size: 14px;
    }
    /* Form Options */
    .form-options {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      margin-bottom: 20px;
    }
    .form-options a {
      text-decoration: none;
      color: #007bff;
    }
    .form-options a:hover {
      text-decoration: underline;
    }
    /* Login Button */
    .login-btn {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .login-btn:hover {
      background: #0056b3;
    }
    /* Signup Link */
    .signup-link {
      margin-top: 15px;
      font-size: 14px;
    }
    .signup-link a {
      color: #007bff;
      text-decoration: none;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
    /* Responsive */
    @media (max-width: 480px) {
      .login-container {
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  
<div class="login-container">
<p style="text-align:center;  "><?php echo  show_msg() ?></p>
  <form class="login-form" action="login-process.php" method="post">
    <h2>Welcome Back</h2>
    <p>Login to your account</p>

    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="input-group">
      <label for="password">Password</label>
      <div class="password-wrapper">
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>
    </div>

    <div class="form-options">
      
      <a href="#">Forgot Password?</a>
    </div>

    <button type="submit" class="login-btn">Login</button>

    <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
  </form>
</div>

<script>

    function togglePassword() {
        let passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

</script>

</body>

</html>