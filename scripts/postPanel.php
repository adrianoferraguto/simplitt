<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 24/07/2016
 * Time: 13.41
 */

$recurring = True;
include("../static/config.php");

?>

<div class="container">

<?php

$query = "SELECT *, posts.id as idPost FROM posts, users WHERE posts.userId = users.id AND posts.id=$_GET[id]";
/*
if ($result = $conn->query($query)) {

    // fetch associative array
    while ($row = $result->fetch_assoc()) {
        echo "Posted by: ".$row['username']."<br>";
        echo "<h3>".$row['title']."</h3><br>";
        echo $row['content']."<br><br>";
    }

    // free result set
    $result->free();
}
*/
if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

        $upvotes = $conn->query("SELECT count(*) as votes FROM postsvotes, posts WHERE posts.id = postsvotes.postId AND posts.id = ".$row['idPost']." AND postsvotes.type = 'UP';")->fetch_assoc()['votes'];
        $downvotes = $conn->query("SELECT count(*) as votes FROM postsvotes, posts WHERE posts.id = postsvotes.postId AND posts.id = ".$row['idPost']." AND postsvotes.type = 'DOWN';")->fetch_assoc()['votes'];

        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo $row['title']; ?></h3>
            </div>
            <div class="panel-body">
                <?php echo substr($row['content'],0,1000)?>
            </div>
            <div class="panel-footer">
                Posted by <?php echo $row['username'].' on '.$row['datetime'].' <a href="post.php?id='.$row['idPost'].'">Permalink</a><br>'; ?>
                <a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=UP">Upvote</a>
                <a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=DOWN">Downvote</a><br>
                Post karma: <?php echo ($upvotes-$downvotes); ?> (<?php echo $upvotes; ?> upvotes and <?php echo $downvotes; ?> downvotes)
            </div>
        </div>

        <?php
    }
    ?>



    <?php

    /* free result set */
    $result->free();
}



?>
</div>
