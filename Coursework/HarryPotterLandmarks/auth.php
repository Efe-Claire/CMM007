<?php
session_start();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Check if the user is an admin
        if ($_POST['usertype'] === 'admin') {
            // Check if username and password are correct for admin
            if ($_POST['username'] === 'admin' && $_POST['password'] === 'password123') {
                // Set session variables
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['usertype'] = $_POST['usertype'];
                // Redirect to admin page
                header('Location: admin.php');
            } else {
                // Invalid credentials for admin
                echo "Invalid credentials for admin";
            }
        } else {
            // Check if username and password are correct for user
            if ($_POST['username'] === 'user' && $_POST['password'] === 'password123') {
                // Set session variables
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['usertype'] = $_POST['usertype'];
                // Redirect to user page
                header('Location: user.php');
            } else {
                // Invalid credentials for user
                echo "Invalid credentials for user";
            }
        }
    } else {
        // Username or password is missing
        echo "Please enter username and password";
    }
}
?>

<?php
session_start();
require('db.php');

// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    // Assign variables from the form
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Check if username or email already exists in the database
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // If user exists, throw an error
    if ($user) {
        if ($user['username'] === $username) {
            $_SESSION['signup_error'] = "Username already exists";
        }

        if ($user['email'] === $email) {
            $_SESSION['signup_error'] = "Email already exists";
        }
    } else {
        // If user does not exist, insert user into database
        $password = md5($password);
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        mysqli_query($con, $query);
        $_SESSION['signup_success'] = "Registration successful, please log in.";
    }
}

// Redirect to the signup page
header('location: signup.php');
exit();
?>

