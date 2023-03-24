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
        $query = "SELECT * FROM users
        WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            header("Location: user/dashboard/");
        } else {
            echo "Invalid username or password.";
        }
    }

    function registerUser($conn, $username, $email, $password, $password2){
        $query = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
        if($password == $password2){
            if(mysqli_query($conn, $query)){
                $_SESSION['username'] = $username;
                echo "User created successfully.";
                header("Location: user/dashboard/");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Passwords do not match.";
        }
    }