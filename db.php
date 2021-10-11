<?php

    $connection=mysqli_connect('localhost', 'root', 'root', 'cabinet');
    
    if(!$connection) {
        die("Database connection failed");
    }
?>
