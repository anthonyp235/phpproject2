<?php
include("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "images/"; // Directory where images will be stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        // Update the profile_picture column in the database with the new file name
        $sql = "UPDATE subscribers SET profile_picture='" . basename($_FILES["image"]["name"]) . "' WHERE username='{$_POST['username']}'";

        if ($conn->query($sql) === TRUE) {
            echo "Profile picture path updated successfully in the database";
        } else {
            echo "Error updating profile picture path: " . $conn->error;
        }

        $uploadOk = 0;
    } else {
        // Check if the uploaded file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

            // Assuming you have a 'subscribers' table with a 'profile_picture' column to store the file path
            $image_path = basename($_FILES["image"]["name"]);

            // Update the profile_picture column in the database with the new file name
            $sql = "UPDATE subscribers SET profile_picture='$image_path' WHERE username='{$_POST['username']}'";

            if ($conn->query($sql) === TRUE) {
                echo "Profile picture path updated successfully in the database";
            } else {
                echo "Error updating profile picture path: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
