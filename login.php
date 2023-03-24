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
    </HEAD>
    <BODY>
        <H1>Login</H1>       
        
        <?php
            if(isset($_POST['submit'])){
                loginUser($conn, $_POST['username'], $_POST['password']);
            }
        ?>

        <FORM METHOD="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control">
            </div>        
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </FORM>
        New User? <A HREF="register.php">Create a New Account</A>
    </BODY>
</HTML>