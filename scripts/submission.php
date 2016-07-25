<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 00.51
 */

include("../static/config.php");

$title = strip_tags($_POST[post_title]);
$content = strip_tags($_POST[post_content]);

$query = "INSERT INTO posts (userId, title, content, datetime) VALUES (".$_SESSION['id'].",'$title','$content','".date ("Y-m-d H:i:s")."')";

$conn->query($query);

// Redirect towards home
header("location: ../pages/index.php");
