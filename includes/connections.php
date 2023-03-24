<?php
    
    include("functions.php");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "data_aqua";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Global Functions
    session_start();
    createDB($conn, $db_name);
    mysqli_select_db($conn, $db_name);
    include "tablequery.php";
?>