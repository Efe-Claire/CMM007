<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

// Retrieve and display data from the database
// ...

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
  
  <!-- Display the administrative interface -->
  <!-- ... -->
  
  <a href="logout.php">Logout</a>
</body>
</html>
