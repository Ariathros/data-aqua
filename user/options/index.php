<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");

    $username = $_SESSION['username'];
    $query = "SELECT * FROM user_account
    WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $wifi_ssid = $row['wifi_ssid'];
        $wifi_pass = $row['wifi_password'];
    }
?>

<html>
<head>
    <title>Options</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
</head>
<body>
    <?php
        include "../includes/sidebar.php";
    ?>

    <h1><br><br>Options</h1>
    <hr>
    <form>
        Device ID: <input type="text" name="device_id" value="<?php echo $_SESSION['channel_id']; ?>"><br>
        WiFi SSID: <input type="text" name="wifi_ssid" value="<?php echo $wifi_ssid; ?>"><br>
        WiFi Password: <input type="password" name="wifi_pass" value="<?php echo $wifi_pass; ?>"><br>
        <input type="submit" value="Save Changes">
    </form>
    
</body>

</html>