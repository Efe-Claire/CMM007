<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['story'];
    $file_name = $_FILES['file-upload']['name'];
    $file_size = $_FILES['file-upload']['size'];
    $file_tmp = $_FILES['file-upload']['tmp_name'];
    $file_type = $_FILES['file-upload']['type'];
    
    // Move the uploaded file to a permanent location
    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($file_name);
    move_uploaded_file($file_tmp, $target_file);
    
    // Store the file metadata in a database
    // ...

    // Send an email notification
    $to = "youremail@example.com";
    $subject = "New story submission";
    $body = "Name: $name\nEmail: $email\nStory: $story";
    $headers = "From: $email";
    mail($to, $subject, $body, $headers);

    echo "Thank you for submitting your story!";
}
?>