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
        <div class="p-5">
            <div>
                <div>
                    <H1>Hello, Fish Farmer!</H1>
                    <h6>Sign in to start your session. </h6>
                </div> 

                <?php
                    if(isset($_POST['submit'])){
                        loginUser($conn, $_POST['username'], $_POST['password']);
                    }
                ?>

                <FORM METHOD="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" REQUIRED>
                    </div>        
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" REQUIRED>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </FORM>
                New User? <A HREF="register.php">Create a New Account</A>
            </div>
        </div>
    </BODY>
</HTML>