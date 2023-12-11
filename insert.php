<?php
include("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
        // Login form submitted
        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];

        // Validate login credentials
        $sql = "SELECT * FROM subscribers WHERE email = '$loginEmail' AND password = '$loginPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful, redirect to a new page or perform actions
            header("Location: display.php");
            exit(); 
        } else {
            echo "Invalid credentials!";
        }
    } elseif (isset($_POST['signupEmail']) && isset($_POST['signupPassword']) && isset($_POST['signupUsername']) && isset($_POST['signupName'])) {
        // Signup form submitted
        $signupEmail = $_POST['signupEmail'];
        $signupPassword = $_POST['signupPassword'];
        $signupUsername = $_POST['signupUsername'];
        $signupName = $_POST['signupName'];

        // Check if the username or email already exists
        $sql_check = "SELECT * FROM subscribers WHERE email = '$signupEmail' OR username = '$signupUsername'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "Username or Email already exists!";
        } else {
            // Insert new user into the database
            $sql_insert = "INSERT INTO subscribers (fullname, email, username, password) VALUES ('$signupName', '$signupEmail', '$signupUsername', '$signupPassword')";
            
            if ($conn->query($sql_insert) === TRUE) {
                header("Location: display.php");
                echo "<script>alert('Record Inserted Successfully, Please login with your credentials');</script>";



            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
