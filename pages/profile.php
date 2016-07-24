<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/07/2016
 * Time: 12.53
 */

// Page parametres
$pagename = "Profile";

include("../static/config.php");

include("../static/header.php");

$posts = array();

?>

<!--<div class="container">-->

<?php

$query = "SELECT *, p.id as idPost FROM posts as p, users as u WHERE u.id = p.userId AND u.id = ".$_GET['id']." ORDER BY p.id";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //print_r($row);
        array_push($posts,$row['idPost']);
        //$_GET['id'] = $row['idPost'];
        //include("../scripts/postPanel.php");

    }
}
foreach($posts as &$post){
    $_GET['id'] = $post;
    include("../scripts/postPanel.php");
}
?>


<!--</div>-->

<?php include("../static/footer.php");