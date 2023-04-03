<?php
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $story = $_POST['story'];
        $image = $_FILES['image']['name'];

        // Validate the form data (you can add more validation here)
        if (empty($name) || empty($email) || empty($story)) {
            echo '<p>Please fill in all the fields.</p>';
        } else {

            // Connect to the database
            $host = 'localhost'; // Replace with your database host
            $username = 'root'; // Replace with your database username
            $password = ''; // Replace with your database password
            $dbname = 'hp_landmarks'; // Replace with your database name

            $conn = mysqli_connect($host, $username, $password, $dbname);

            if (!$conn) {
                die('Error connecting to the database: ' . mysqli_connect_error());
            }

            // Insert the story into the database
            $sql = "INSERT INTO hp_landmarks (name, email, story, image) VALUES ('$name', '$email', '$story', '$image')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Upload image file
                $target_dir = "";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                echo '<p>Your story has been submitted!</p>';
            } else {
                echo '<p>There was an error submitting your story. Please try again.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
        }
    }
?>