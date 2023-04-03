<?php
session_start();

// check if user is already logged in
if (isset($_SESSION["username"])) {
  // redirect to welcome page
  header("Location: login.php");
  exit();
}

// check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validate username and password
  $username = $_POST["username"];
  $password = $_POST["password"];
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "cmm007";
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);
  if ($result && $result->num_rows == 1) {
    // set session variables and redirect to welcome page
    $_SESSION["username"] = $username;
    header("Location: stories.php");
    exit();
  } else {
    // display error message
    $error = "Invalid username or password";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Harry Potter Landmarks</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
  <header>
    <h1>Login to Harry Potter Landmarks</h1>
  </header>
  <main>
  <?php if(isset($_SESSION["username"])) { ?>
      <form class="logout-form" method="post" action="logout.php">
        <p>Welcome, <?php echo $_SESSION["username"]; ?>!</p>
        <button type="submit" name="logout">Logout</button>
      </form>
    <?php } else { ?>
    <form class="login-form" method="post" action="">
      <h2>Log in to your account</h2>
      <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
      <?php } ?>
      <label for="username"><i class="fa fa-user"></i> Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
      <label for="password"><i class="fa fa-lock"></i> Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <button type="submit" name="login">Login</button>
      <div class="signup-link">
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </div>
    </form>
    <?php } ?>
  </main>
</body>
</html>
