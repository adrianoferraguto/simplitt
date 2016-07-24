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

<!--<div class="container">-->

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

        if(!isset($_SESSION['id'])) { $didUpvote=0; $didDownvote=0; }
        else {
            $didUpvote = $conn->query("SELECT * FROM postsvotes, posts WHERE posts.id = postsvotes.postId AND posts.id = " . $row['idPost'] . " AND postsvotes.type = 'UP' AND postsvotes.userId = " . $_SESSION['id'] . ";")->num_rows;
            $didDownvote = $conn->query("SELECT * FROM postsvotes, posts WHERE posts.id = postsvotes.postId AND posts.id = " . $row['idPost'] . " AND postsvotes.type = 'DOWN' AND postsvotes.userId = " . $_SESSION['id'] . ";")->num_rows;
        }

        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo $row['title']; ?></h3>
            </div>
            <div class="panel-body">
                <?php echo substr($row['content'],0,1000)?>
            </div>
            <div class="panel-footer">
                Posted by <?php echo '<a href="../pages/profile.php?id='.$row['userId'].'">'.$row['username'].'</a> on '.$row['datetime'];
                if($showLink){ echo ' <a href="post.php?id='.$row['idPost'].'">Permalink</a>'; } echo '<br>'; ?>
                <a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=UP"><span class="glyphicon glyphicon-chevron-up"<?php if($didUpvote) echo ' style="color:red"' ?>></span>Upvote</a>
                <a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=DOWN"><span class="glyphicon glyphicon-chevron-down"<?php if($didDownvote) echo ' style="color:red"' ?>></span>Downvote</a><br>
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
<!--</div>-->
