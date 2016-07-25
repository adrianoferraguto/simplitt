<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 17/07/2016
 * Time: 21.58
 */

// Page parametres
$pagename = "Home";

include("../static/config.php");

include("../static/header.php");

$posts = array();

?>

    <div class="container">

        <?php

        include("../scripts/sortingSelector.php");

        $query = "SELECT *, p.id as idPost FROM posts as p, users as u WHERE u.id = p.userId ORDER BY p.datetime DESC LIMIT 100";

        if ($result = $conn->query($query)) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                //print_r($row);
                array_push($posts,$row['idPost']);
                //$_GET['id'] = $row['idPost'];
                //include("../scripts/postPanel.php");

            }
        }
        if(strpos($_SERVER['QUERY_STRING'],'karma')) { $posts = sortByKarma($posts); }
        $showLink = true;
        foreach($posts as &$post){
            $_GET['id'] = $post;
            include("../scripts/postPanel.php");
        }
        ?>

    </div>

<?php include("../static/footer.php"); ?>