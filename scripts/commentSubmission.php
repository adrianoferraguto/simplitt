<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/07/2016
 * Time: 22.31
 */

include("../static/config.php");

$query = "INSERT INTO comments (userId, postId, content, datetime) VALUES (".$_SESSION['id'].",'$_GET[postId]','$_POST[comment_content]','".date ("Y-m-d H:i:s")."')";

$conn->query($query);

// Redirect towards last page (ideally a post)
header('Location: ' . $_SERVER['HTTP_REFERER']);
