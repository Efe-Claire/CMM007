<?php
session_start();

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the user's input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: validate user input here

    // connect to the database
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "cmm007";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // check for database connection error
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // prepare the SQL query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // execute the query
    $result = mysqli_query($conn, $sql);

    // check if there is a match in the database
    if (mysqli_num_rows($result) == 1) {

        // set a session variable to remember that the user is logged in
        $_SESSION['logged_in'] = true;

        // redirect the user to the homepage
        header('Location: index.php');
        exit;

    } else {

        // display an error message and redirect the user back to the login page
        echo 'Invalid username or password';
        header('Location: login.php');
        exit;
    }
}
