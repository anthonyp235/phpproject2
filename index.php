<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login and Signup</title>
</head>
<body class="login-page">
    <header>
        <?php
	include("includes/header.php");
        ?>
    </header>
    <main>

        <div class="container_todo">   

            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>Do you have an account already?</h3>
                    <p>Login to access to the website</p>
                    <button id="btn_login">Login</button>
                </div>
                <div class="caja_trasera_signup">
                    <h3>I don´t have an account yet</h3>
                    <p>Sign up to access to the website</p>
                    <button id="btn_signup">Signup</button>
                </div>
            </div>
            <div class="container_login_signup">
                <form action="insert.php" method="POST" class="formulario_login" id="loginForm">
                    <h2>Login</h2>
                    <input type="text" placeholder="Your Email address" name="loginEmail" id="loginEmail">
                    <input type="password" placeholder="Your password" name="loginPassword" id="loginPassword">
                    <button type="submit">Login</button>
                </form>

                <form action="insert.php" method="POST" class="formulario_signup" id="signupForm">
                    <h2>Sign up</h2>
                    <input type="text" placeholder="Your full name" name="signupName" id="signupName">
                    <input type="text" placeholder="Your email address" name="signupEmail" id="signupEmail">
                    <input type="text" placeholder="Your username" name="signupUsername" id="signupUsername">
                    <input type="password" placeholder="Password" name="signupPassword" id="signupPassword">
                    <button type="submit">Signup</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>