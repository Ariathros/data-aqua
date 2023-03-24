<?php

    $tablequery = "`Users` (
        `id` int(6) AUTO_INCREMENT,
        `username` varchar(20),
        `password` varchar(24),
        `email` varchar(56),
        PRIMARY KEY (`id`)
      )    
      ";
      createTable($conn, $tablequery);