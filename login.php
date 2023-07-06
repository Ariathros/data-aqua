<?php 
    include("includes/connections.php");
    include("includes/sessions.php");
?>

<HTML>
    <HEAD>
        <title>Login</title>
        <?php
            include "includes\bootstrap-header.php";
        ?>
        <link rel="stylesheet" href="./assets/style.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </HEAD>
    <BODY class="login_page">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <?php
                    if(isset($_POST['register'])){
                        registerUser($conn, $_POST['username'], $_POST['email'],  $_POST['device_id'], $_POST['password'], $_POST['password2']);
                    }
                ?>
                <form METHOD="POST">
                    <h2>Create Account</h2>
                    <input name="username" type="text" placeholder="Username" class="form-control" REQUIRED>
                    <input name="email" type="text" placeholder="Email" class="form-control" aria-describedby="emailHelp" REQUIRED>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <input name="device_id" type="text" placeholder="Device ID" class="form-control" REQUIRED>
                    <input name="password" type="password" placeholder="Password" class="form-control" REQUIRED>
                    <input name="password2" type="password" placeholder="Confirm Password" class="form-control" REQUIRED>
                    <button name="register" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <?php
                    if(isset($_POST['login'])){
                        loginUser($conn, $_POST['username'], $_POST['password']);
                    }
                ?>
                <form METHOD="POST">
                    <h2>Sign In</h2>
                    <input name="username" type="text" placeholder="Username" class="form-control" REQUIRED>
                    <input name="password" type="password" placeholder="Password" class="form-control" REQUIRED>
                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <img src="./assets/images/logo.png" alt="">
                        <h1>Hello, Fish Farmer!</h1>
                        <p>Sign in to start your session.</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <img src="./assets/images/logo.png" alt="">
                        <h1>Hello, Fish Farmer!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Register</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="./assets/myScript.js"></script>
    </BODY>
</HTML>