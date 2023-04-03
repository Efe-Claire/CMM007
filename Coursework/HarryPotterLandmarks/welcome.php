<?php
session_start();
// check if user is logged in
if (!isset($_SESSION["username"])) {
  // user is not logged in, redirect to login page
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Harry Potter Landmarks</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<header>
		<h1>Welcome to Harry Potter Landmarks</h1>
	</header>
	<main>
		<p>Hello, <?php echo $_SESSION["username"]; ?>! You have successfully logged in.</p>
		<p>Enjoy your stay and explore the magical world of Harry Potter!</p>
		<form class="logout-form" method="post" action="logout.php">
			<button type="submit" name="logout">Logout</button>
		</form>
	</main>
</body>
</html>
