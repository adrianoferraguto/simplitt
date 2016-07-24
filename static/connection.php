<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 17/07/2016
 * Time: 23.13
 */

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($debug) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
}

