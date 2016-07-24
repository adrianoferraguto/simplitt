<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 23/07/2016
 * Time: 19.25
 */

include("../static/config.php");

if(!isset($_SESSION['id'])) { header("Location: ../../pages/login.php"); }

$query = "SELECT type
          FROM postsvotes as v, posts as p, users as u
          WHERE v.postId = p.id
            AND v.userId = u.id
            AND p.id = ".$_GET['id']."
            AND u.id = ".$_SESSION['id'];

$result = $conn->query($query)->fetch_assoc()['type'];

if (!isset($result)){
    // Insert the vote
    $query = "INSERT INTO postsvotes VALUES(".$_GET['id'].",".$_SESSION['id'].",'".$_GET['type']."')";
}
// Else, if there is already a vote and is the same as the one requested, delete that vote
else if ($result===$_GET['type']){
    $query = "DELETE FROM postsvotes
              WHERE postId = ".$_GET['id']."
                AND userId = ".$_SESSION['id'];
} // Else, in the case there is already a vote but of different kind than the one requested, replace with the latter
else {
    $query = "UPDATE postsvotes
              SET type='".$_GET['type']."'
              WHERE postId = ".$_GET['id']."
                AND userId = ".$_SESSION['id'];
    echo $query;
}

$conn->query($query);

// Redirect towards last page (ideally index or profile page)
header('Location: ' . $_SERVER['HTTP_REFERER']);