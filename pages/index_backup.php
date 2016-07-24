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

?>

<div class="container">

<?php

$query = "SELECT *, p.id as idPost FROM posts as p, users as u WHERE u.id = p.userId ORDER BY p.id";

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

<?php include("../static/footer.php"); ?>