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

}

if($_GET['type']==='comment'){ destroyComment($_GET['id']); } else if($_GET['type']==='post'){ destroPost($_GET['id']); }
header('Location: ' . $_SERVER['HTTP_REFERER']);