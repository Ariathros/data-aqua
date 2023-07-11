<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Dashboard</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
</head>
<body>
    <?php
        include "../includes/sidebar.php";
    ?>

    <h1>Dashboard</h1>
    <p>Here is your dashboard.</p>

    <div class="p-3 border">
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/1?bgcolor=%23ffffff&color=%23ff9f00&dynamic=true&results=60&title=Temperature&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/2?bgcolor=%23ffffff&color=%236aa84f&dynamic=true&results=60&title=Total+Dissolved+Solids&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/3?bgcolor=%23ffffff&color=%236a329f&dynamic=true&results=60&title=pH+Level&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/4?bgcolor=%23ffffff&color=%232986cc&dynamic=true&results=60&title=Ammonia&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/5?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Dissolved+Oxygen&type=line"></iframe>
    </div>


</body>

</html>