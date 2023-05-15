<?php
    function createDB($conn, $db_name) {
        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
        $conn->query($sql);
    }

    function createTable($conn, $tablequery){
        // Create table
        $sql = "CREATE TABLE IF NOT EXISTS ". $tablequery;
        $conn->query($sql);
    }

    // LOGIN 

    function loginUser($conn, $username, $password){
        $query = "SELECT * FROM user_account
        WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['channel_id'] = $row['device_id'];
            header("Location: user/dashboard/");
        } else {
            echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
                Invalid username or password.
            </div>
          </div>
          ";
        }
    }

    function registerUser($conn, $username, $email, $device_id, $wifi_ssid, $wifi_pass, $password, $password2){
        $query = "INSERT INTO user_account (username, email, device_id, wifi_ssid, wifi_password, password)
        VALUES ('$username', '$email', '$device_id', '$wifi_ssid', '$wifi_pass', '$password')";
        if($password == $password2){
            if(mysqli_query($conn, $query)){
                $_SESSION['username'] = $username;
                $_SESSION['channel_id'] = $device_id;
                echo "User created successfully.";
                header("Location: user/dashboard/");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
            Passwords do not match.
            </div>
          </div>";
        }
    }