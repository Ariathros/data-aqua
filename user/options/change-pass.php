<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Change Password</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body >
    <?php
        include "../includes/sidebar.php";
    ?>
    <div class="user-settings">
        <h1>Change Password</h1>
        <hr></hr>
        <form method="POST">
        Old Password: <input name="oldPass" type="PASSWORD"><br>
        New Password: <input name="newPass" type="PASSWORD"><br>
        Confirm Password: <input name="newPass2" type="PASSWORD"><br>
        <input name="update_pass" type="submit" value="Update Password">
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST['update_pass'])){
        updatePassword($conn, $_POST['oldPass'], $_POST['newPass'], $_POST['newPass2'], $_SESSION['channel_id']);
    }
?>