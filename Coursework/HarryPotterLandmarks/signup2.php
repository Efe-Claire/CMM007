<?php
session_start();

// check if user is already logged in
if (isset($_SESSION["username"])) {
  // redirect to index page
  header("Location: index.php");
  exit();
}

// check if signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validate form inputs
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  if ($password != $confirm_password) {
    $error = "Passwords do not match";
  } else {
    // connect to database
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "cmm007";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // check if username already exists in database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
      $error = "Username already exists";
    } else {
      // insert user information into database
      $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
      if ($conn->query($query) === TRUE) {
        // set session variables and redirect to index page
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
      } else {
        die("Error: " . $query . "<br>" . $conn->error);
      }
    }
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up - Harry Potter Landmarks</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<header>
		<h1>Sign up for Harry Potter Landmarks</h1>
	</header>
	<main>
		<form class="signup-form" method="post" action="">
			<h2>Create a new account</h2>
			<?php if(isset($error)) { ?>
				<p class="error"><?php echo $error; ?></p>
			<?php } ?>
			<label for="username"><i class="fa fa-user"></i> Username</label>
			<input type="text" id="username" name="username" placeholder="Enter your username" required>
			<label for="password"><i class="fa fa-lock"></i> Password</label>
			<input type="password" id="password" name="password" placeholder="Enter your password" required>
			<label for="confirm_password"><i class="fa fa-lock"></i> Confirm Password</label>
			<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
			<button type="submit" name="signup">Sign Up</button>
			<div class="login-link">
				<p>Already have an account? <a href="login.php">Log in</a></p>
			</div>
		</form>
	</main>
</body>
</html>
