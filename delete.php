<?php
include("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['username'])) {
    $username = $_POST['username'];

    // Delete the record of the logged-in user from the subscribers table
    $sql = "DELETE FROM subscribers WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after deleting the record
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
