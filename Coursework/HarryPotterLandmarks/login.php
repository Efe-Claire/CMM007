<!DOCTYPE html>
<html>
<head>
	<title>Login - Harry Potter Landmarks</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="assets/unsemantic-grid-responsive-tablet.css">
	<style>
		.login-icon {
			position: absolute;
			top: 0;
			right: 0;
			padding: 10px;
		}
	</style>
</head>
<body>
<header>
<div class="login-icon">
			<a href="login.php"><img src="login-icon.png" alt="LOGIN"></a>
			<a href="signup.php"><img src="signup-icon.png" alt="SIGNUP"></a>
	</div>
	<nav>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="landmarks.html">Landmarks</a></li>
			<li><a href="Stories.html">Stories</a></li>
			<li><a href="About Us.html">About Us</a></li>
			<li><a href="Reviews.php">Reviews</a></li>
		</ul>
	</nav>
	<div id="searchbox">
		<form>
        <p>Search</p>
        <input type="text" name="searchfield">
        <input type="submit" value="Go">
		</form>
	</div>
</header>

<main>
	<section>
		<h1>Login</h1>
		<form action="login_handler.php" method="post">
			<label for="username">Username:</label>
			<input type="username" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</section>
</main>

<footer>
	<h2>Connect with Us</h2>
	<ul>
		<li><a href="http://www.facebook.com"><img src="facebooklogo.png" alt="Facebook"></a></li>
		<li><a href="http://www.twitter.com"><img src="twitterlogo.png" alt="Twitter"></a></li>
		<li><a href="http://www.youtube.com"><img src="youtubelogo.png" alt="Youtube"></a></li>
	</ul>
</footer>
</body>
</html>