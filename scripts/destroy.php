<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 25/07/2016
 * Time: 16.43
 */

include("../static/config.php");

// Checks if the comment belongs to the logged in user, if yes deletes it
function destroyComment($commentId){
    global $conn;
    global $_SESSION;
    if($conn->query("SELECT userId FROM comments WHERE id=".$commentId)->fetch_assoc()['userId']===$_SESSION['id']) {
        $query = "DELETE FROM comments WHERE id=" . $commentId;
        $conn->query($query);
    }
}

function destroyPost($postId){
    global $conn;
    global $_SESSION;
    if($conn->query("SELECT userId FROM posts WHERE id=".$postId)->fetch_assoc()['userId']===$_SESSION['id']) {
        $query = "DELETE FROM comments WHERE postId=".$postId;
        $conn->query($query);
        $query = "DELETE FROM postsvotes WHERE postId=".$postId;
        $conn->query($query);
        $query = "DELETE FROM posts WHERE id=".$postId;
        $conn->query($query);
    }
}

if($_GET['type']==='comment'){ destroyComment($_GET['id']); } else if($_GET['type']==='post'){ destroyPost($_GET['id']); }
header('Location: ' . $_SERVER['HTTP_REFERER']);