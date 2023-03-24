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
            echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
                Invalid username or password.
            </div>
          </div>
          ";
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
            echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
            Passwords do not match.
            </div>
          </div>";
        }
    }