<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>User Settings</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body >
    <?php
        include "../includes/sidebar.php";
    ?>
    <div class="user-settings">
        <h1>User Settings</h1>
        <hr></hr>
        <h2>Account Settings</h2>
        <form method="POST" action="../options/">
            
        Username: <input name="username" type="TEXT" value="<?php echo $_SESSION['username'];?>"><br>
        Device ID: <?php echo $_SESSION['channel_id'];?><br>
        <input name="change_details" type="submit" value="Save Changes">
        </form>



        <a href="change-pass.php">Change Password</a>
    </div>
</body>

</html>

<?php
    if(isset($_POST['change_details'])){
        editUsername($conn, $_POST['username'], $_SESSION['channel_id']);
    }
?>