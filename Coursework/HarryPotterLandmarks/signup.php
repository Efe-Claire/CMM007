<?php
session_start();
// establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmm007";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the user's input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // validate user input
    $errors = array();
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // if there are no validation errors, insert the user data into the database
    if (empty($errors)) {
        // hash the password before storing it in the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";


        // prepare the insert statement
        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

        // execute the insert statement
        if (mysqli_stmt_execute($stmt)) {
            // if the insert was successful, redirect the user to the login page
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;
            header('Location: login.php');
            exit;
        } else {
            // if the insert failed, display an error message
            echo "Error: " . mysqli_error($conn);
        }

        // close the statement
        mysqli_stmt_close($stmt);
    } else {
        // if there are validation errors, display them and redirect the user back to the form
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}

// close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="assets/unsemantic-grid-responsive-tablet.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="landmarks.html">Landmarks</a></li>
				<li><a href="Stories.html">Stories</a></li>
				<li><a href="About Us.html">About Us</a></li>
				<li><a href="Reviews.php">Reviews</a></li>
			</ul>
		</nav>
	</header>
	<h1>Signup</h1>
	<main>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<label for="username">Username:</label><br>
			<input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"><br>
			<label for="email">Email:</label><br>
			<input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password"><br>
			<label for="confirm_password">Confirm Password:</label><br>
			<input type="password" name="confirm_password"><br>
			<input type="submit" value="Signup">
		</form>
	</main>
</body>
</html>
