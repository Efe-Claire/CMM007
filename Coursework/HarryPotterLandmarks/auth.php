<?php
session_start();

// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cm007');

// Connect to database
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($db  === false) {
    die("ERROR: Could not connect. " . $db->mysqli_connect_error());
}

// Login function
function login($db , $username, $password) {
    $sql = "SELECT * FROM HarryPotterLandmarks WHERE username='$username'";
    $result = mysqli_query($db , $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];
            header("Location: index.php");
            exit();
        } else {
            return "Invalid password.";
        }
    } else {
        return "Invalid username.";
    }
}

// Signup function
function signup($db, $name, $username, $email, $password) {
    // Check if username already exists
    $sql = "SELECT * FROM cm007 WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        return "Username already taken.";
    }

    // Check if email already exists
    $sql = "SELECT * FROM cm007 WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        return "Email already taken.";
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO HarryPotterLandmarks (username, email, password, type) VALUES ('$username', '$email', '$hashed_password', 'user')";
    if (mysqli_query($db, $sql)) {
        return "Signup successful.";
    } else {
        return "ERROR: Could not execute $sql. " . mysqli_error($db);
    }
}

// Logout function
function logout() {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// Check if user is logged in and redirect to login page if not
function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Check if user is an admin and redirect to index page if not
function check_admin() {
    if ($_SESSION['type'] != 'admin') {
        header("Location: index.php");
        exit();
    }
}
?>
