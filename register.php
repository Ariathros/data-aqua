<?php    
    include('includes/connections.php');
    include('includes/sessions.php');
?>
<HTML>
<HEAD>
    <title>Login</title>
    <?php include('includes\bootstrap-header.php'); ?>
</HEAD>
<BODY>    
    <div class="p-5">
        <div>
            <H1>Register</H1>

            <?php
                if(isset($_POST['submit'])){
                    registerUser($conn, $_POST['username'], $_POST['email'], $_POST['device_id'], $_POST['password'], $_POST['password2']);
                }
            ?>

            <FORM METHOD="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" REQUIRED>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="text" class="form-control" aria-describedby="emailHelp" REQUIRED>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="device_id" class="form-label">Device ID</label>
                    <input name="device_id" type="text" class="form-control" REQUIRED>
                </div>
                <div class="mb-3">
                    <label for="wifi_ssid" class="form-label">WiFi SSID</label>
                    <input name="wifi_ssid" type="text" class="form-control" REQUIRED>
                </div>
                <div class="mb-3">
                    <label for="wifi_pass" class="form-label">WiFi Password</label>
                    <input name="wifi_pass" type="password" class="form-control" REQUIRED>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" REQUIRED>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input name="password2" type="password" class="form-control" REQUIRED>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </FORM>

            Already have an account? <A HREF="login.php">Sign In</A>
        </div>
    </div>
</BODY>
</HTML>