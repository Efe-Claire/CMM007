<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hp_landmarks";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values from the form submission
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$review = mysqli_real_escape_string($conn, $_POST["review"]);

// Insert the new review into the database
$sql = "INSERT INTO reviews (name, review) VALUES ('$name', '$review')";
if (mysqli_query($conn, $sql)) {
    echo "Review submitted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
