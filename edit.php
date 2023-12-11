<?php
session_start();
include 'dbconnection.php'; 

$username = $_GET['username'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);

    $updateSql = "UPDATE subscribers SET 
        username = '$newUsername',   
        email = '$newEmail', 
        password = '$hash' 
        WHERE username = '$username'";

    if (mysqli_query($conn, $updateSql)) {
        echo "<script>alert('Record Updated Successfully');</script>";
    } else {
        echo "<script>alert('Error Updating Record " . mysqli_error($conn) . "');</script>";
    }
}

$sql = "SELECT * FROM subscribers WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
        <?php
            include("includes/header.php");
        ?>
    </header>
    <div class="container">
        <header>
            <h2>Edit User Info</h2>
        </header>
        <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?username=' . $username); ?>" method="post">
            <label for="new_username">Username</label>
            <input type="text" id="new_username" name="new_username" class="new_username" value="<?php echo $row['username']; ?>"><br><br>

            <label for="new_email">Email</label>
            <input type="email" id="new_email" name="new_email" class="new_email" value="<?php echo $row['email']; ?>"><br><br>

            <label for="new_password">Password</label>
            <input type="password" id="new_password" name="new_password" class="new_password" value="<?php echo $row['password']; ?>"><br><br>

            <input type="submit" name="submit" class="btn btn-success" value="Save Changes">
        </form>
    </div>
    <nav>
        <a href="display.php" class="btn btn-link">Back to User List</a>
    </nav>
</body>
</html>
