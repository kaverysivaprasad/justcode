<?php
// Include the database connection file (db_connection.php)
include 'db_connection.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $email = $_POST['email'];
    $course_title = $_POST['course_title'];

    // File upload handling
    $target_dir = "uploads/"; // Create a directory named 'uploads' in your project
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, upload the file and insert data into the database
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $sql = "INSERT INTO documents (email, course_title, file_path) VALUES ('$email', '$course_title', '$target_file')";
            
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully and data inserted into the database.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
