<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Dashboard</title>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    
</head>

<body class="user">
    <?php
        include "../includes/sidebar.php";
    ?>
    <div>
        <h1>Dashboard</h1>
        <p>Here is your dashboard.</p>
    </div>
    
    <div class="p-3">
        <iframe src="https://thingspeak.com/channels/2079467/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Temperature&type=line"></iframe>
        <iframe src="https://thingspeak.com/channels/2079467/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=pH+Level&type=line"></iframe>
        <iframe src="https://thingspeak.com/channels/2079467/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Dissolved+Oxygen&type=line"></iframe>
        <iframe src="https://thingspeak.com/channels/2079467/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Total+Dissolved+Solids&type=line"></iframe>
    </div>
</body>

</html>