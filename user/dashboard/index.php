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

    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2079418/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&timescale=60&title=Temperature&type=line"></iframe>
    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2079418/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=pH+Level&type=line"></iframe><br>
    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2079418/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Dissolved+Oxygen&type=line"></iframe>
    <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2079418/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Total+Dissolved+Solids&type=line"></iframe>
</body>

</html>