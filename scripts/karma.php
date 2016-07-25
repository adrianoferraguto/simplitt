<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/07/2016
 * Time: 18.59
 */

$recurring = True;

include("../static/config.php");

function getUserKarma($userId){
    $query = "SELECT
                (SELECT count(*)
                FROM posts as p, postsvotes as v
                WHERE p.userId = ".$userId."
                  AND p.id = v.postId
                  AND v.type = 'UP')
                -(SELECT count(*)
                FROM posts as p, postsvotes as v
                WHERE p.userId = ".$userId."
                  AND p.id = v.postId
                  AND v.type = 'DOWN')
              as karma";
    global $conn;
    return $conn->query($query)->fetch_assoc()['karma'];
}

function getPostKarma($postId){
    $query = "SELECT
              postId
              ,count(case when type = 'UP' then 1 end)-count(case when type = 'DOWN' then 1 end) karma
              FROM postsvotes
              WHERE postId=".$postId;
    global $conn;
    return $conn->query($query)->fetch_assoc()['karma'];
}

function cmp($a, $b)
{
    return getPostKarma($b)-getPostKarma($a);
}


function sortByKarma($array){
    usort($array,"cmp");
    return $array;
}