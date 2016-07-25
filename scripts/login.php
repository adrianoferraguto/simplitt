<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 17.39
 */

include("../static/config.php");

$username = strip_tags($_POST['username']);
$password = hash('sha256',strip_tags($_POST['password']));

$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
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
