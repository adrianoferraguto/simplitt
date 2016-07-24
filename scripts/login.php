<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 17.39
 */

include("../static/config.php");

$query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
$result = $conn->query($query);

if($result->num_rows===1){
    // Login successful
    $row = $result->fetch_assoc();
    //session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    header("Location: ../pages/index.php");
}
else {
    // Troubles logging in
    header("Location: ../pages/login.php");
}
