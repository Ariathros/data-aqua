<HTML>
<HEAD>
    <title>Login</title>
    <?php include('includes\bootstrap-header.php'); ?>
</HEAD>
<BODY>    
    <H1>Register</H1>        

    <FORM METHOD="POST" ACTION="user/dashboard/">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="text" class="form-control" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>    
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Confirm Password</label>
            <input name="password2" type="password" class="form-control">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </FORM>
    
    Already have an account? <A HREF="login.php">Sign In</A>
</BODY>
</HTML>