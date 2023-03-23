<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="signup-box">
		<h2>Signup</h2>
		<form action="auth.php" method="POST">
  <label for="fullname">Full Name:</label>
  <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required><br></br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" placeholder="Enter your email" required><br></br>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" placeholder="Enter your username" required><br></br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" placeholder="Enter your password" required><br></br>
  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required><br></br>
  <input type="submit" value="Signup">
</form>
		<p>Already have an account? <a href="login.php">Login</a></p>
	</div>
</body>
</html>



