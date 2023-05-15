<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
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

    <h1>Options</h1>
    <p>Here are your options.</p>

    <form>
        Device ID: <input type="text" name="device_id" value="<?php echo $_SESSION['channel_id']; ?>"><br>
        WiFi SSID: <input type="text" name="wifi_ssid" value="<?php echo $_SESSION['wifi_ssid']; ?>"><br>
        WiFi Password: <input type="text" name="wifi_pass" value="<?php echo $_SESSION['wifi_pass']; ?>"><br>
        <input type="submit" value="Save Changes">
    </form>
    
</body>

</html>