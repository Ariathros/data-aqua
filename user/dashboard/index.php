<?php
    include("../../includes/connections.php");
    include("../includes/sessions.php");
?>

<html>
<head>
    <title>Dashboard</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        /* Button styles */
        button {
            background-color: #007bff; /* Blue background color */
            color: #fff; /* White text color */
            padding: 10px 20px; /* Add padding (top and bottom: 10px, left and right: 20px) */
            border: none;
            border-radius: 5px; /* Add rounded corners */
            cursor: pointer;
            font-size: 16px; /* Adjust font size as needed */
        }

        /* Optional: Add hover effect */
        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
    <?php include("../../includes/bootstrap-header.php"); ?>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include "../includes/sidebar.php";
    ?>

    <div class="dashboard">
        <h1>Dashboard</h1>
        <p>Here is your dashboard.</p>

    <div class="p-3 border">
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/1?bgcolor=%23ffffff&color=%23ff9f00&dynamic=true&results=60&title=Temperature&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/2?bgcolor=%23ffffff&color=%236aa84f&dynamic=true&results=60&title=Total+Dissolved+Solids&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/3?bgcolor=%23ffffff&color=%236a329f&dynamic=true&results=60&title=pH+Level&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/4?bgcolor=%23ffffff&color=%232986cc&dynamic=true&results=60&title=Ammonia&type=line"></iframe>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/<?php echo $_SESSION['channel_id']; ?>/charts/5?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Dissolved+Oxygen&type=line"></iframe>
    </div>

    <button onclick="fetchData()">Fetch Data</button>
    <button onclick="exportToCSV()">Export to CSV</button>
    <div id="data-container" class="p-3 border">

    </div>

    <script>
        let tableData = [];

        function fetchData() {
            fetch('get_data.php')
                .then(response => response.json())
                .then(data => {
                    tableData = data.feeds;
                    displayData(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function displayData(data) {
            const container = document.getElementById('data-container');

            if (data && data.feeds && data.feeds.length > 0) {
                const table = document.createElement('table');
                table.border = 1;

                const headers = Object.keys(data.feeds[0]);
                const headerRow = table.insertRow();
                for (const header of headers) {
                    const th = document.createElement('th');
                    th.textContent = header;
                    headerRow.appendChild(th);
                }

                for (const feed of data.feeds) {
                    const row = table.insertRow();
                    for (const header of headers) {
                        const cell = row.insertCell();
                        cell.textContent = feed[header];
                    }
                }

                container.innerHTML = '';
                container.appendChild(table);
            } else {
                container.innerHTML = 'No data available.';
            }
        }

        function exportToCSV() {
            const csvContent = "data:text/csv;charset=utf-8," + 
                tableData.map(row => Object.values(row).join(",")).join("\n");
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "pond_data.csv");
            document.body.appendChild(link);
            link.click();
        }
    </script>
</body>

</html>