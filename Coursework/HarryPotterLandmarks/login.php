<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Login</h2>
		<form action="auth.php" method="POST">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" placeholder="Enter your username" required><br></br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="Enter your password" required><br></br>
  <input type="submit" value="Login">
</form>
	<?php
include("connection.php"); //Establishing connection with our database
if(empty($_POST["username"]) || empty($_POST["password"]))
 {
 echo "Both fields are required.";
 }else
 {
	<p>Don't have an account? <a href="signup.php">Sign up</a></p>
	</div>
</body>
</html>

