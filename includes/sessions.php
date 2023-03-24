<?php
    if(isset($_SESSION['username'])) {
        header("Location: user/dashboard/");
        exit;
    }