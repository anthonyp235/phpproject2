<!-- display.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>User Display</title>
</head>
<body>
    <header>
        <?php
            include("includes/header.php");
        ?>
    </header>
    <div class="container">
        <h1>User List</h1>

        <!-- Display the user list with name, country, and profile picture -->
        <?php
        include("dbconnection.php");

        // Retrieve names, countries, and profile pictures of all users from the subscribers table
        $sql = "SELECT fullname, country, profile_picture, username FROM subscribers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>Name:</strong> " . $row["fullname"] . "<br>";
                echo "<strong>Country:</strong> " . $row["country"];

                // Display profile picture if available
                if (!empty($row["profile_picture"])) {
                    echo "<br><img src='images/" . $row["profile_picture"] . "' alt='Profile Picture' height='100'>";
                } else {
                    echo "<br>No profile picture uploaded";
                }

                // Button to upload profile picture
                echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
                echo "<input type='hidden' name='username' value='" . $row["username"] . "'>"; 
                echo "<input type='file' name='image'>";
                echo "<input type='submit' name='submit' value='Upload Profile Picture'>"; // Added 'name' attribute for the submit button
                echo "</form>";

                 // Button to edit user info
                echo "<form action='edit.php' method='get'>";
                echo "<input type='hidden' name='username' value='" . $row["username"] . "'>";
                echo "<input type='submit' name='edit' value='Edit'>";
                echo "</form>";

                // Button to delete the logged-in user's record
                echo "<form action='delete.php' method='post'>";
                echo "<input type='hidden' name='username' value='" . $row["username"] . "'>";
                echo "<input type='submit' name='delete' value='Delete My Account'>";
                echo "</form>";

                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No users found";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
