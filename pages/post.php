<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 02.38
 */

$pagename = "Post ".$_GET['id'];

include("../static/config.php");

include("../static/header.php");

?>

<div class="container">

<!--Post-->
<?php

$query = "SELECT * FROM posts, users WHERE posts.userId = users.id AND posts.id=$_GET[id]";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "Posted by: ".$row['username']."<br>";
        echo "<h3>".$row['title']."</h3><br>";
        echo $row['content']."<br><br>";
    }

    /* free result set */
    $result->free();
}
?>

<!--Comment box-->
<?php
    if(isset($_SESSION['id'])){ ?>
        <div class="container">
            <form action="../scripts/commentSubmission.php?postId=<?php echo $_GET['id']; ?>" method="post">
                <label for="post_content">Comment</label>
                <textarea class="form-control" rows="3" name="comment_content"></textarea>
                <br>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
    <?php }
?>

</div>
