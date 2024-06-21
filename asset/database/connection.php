<?php
    session_start();

    $database= new mysqli("localhost","root","","restaurant_booking");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }