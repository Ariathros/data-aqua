<?php

    $tablequery = "`user_account` (
      `id` INT(6) AUTO_INCREMENT,
      `username` VARCHAR(25),      
      `email` VARCHAR(100),
      `password` VARCHAR(25),
      `device_id` INT(10),
      PRIMARY KEY (`id`)) 
      ";
      createTable($conn, $tablequery);